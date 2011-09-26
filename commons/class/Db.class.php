<?php

Class Db {
	
	
	const BIND_TYPE_NUM = "NUM";
	const BIND_TYPE_STR = "CHAR";
	
	
	private static $instance;
	public $con;
	
	public function __construct(){
		$this->server = SERVER;
		$this->login = LOGIN;
		$this->passwd = PASSWORD;
		$this->base = BASE;
	}
	
	public static function getInstance() {
 
     if(is_null(self::$instance)) {
       self::$instance = new Db();  
     }
 
     return self::$instance->getDatabaseInstance();
   }
	
	public function getDatabaseInstance(){
	
		$this->con = mysql_connect($this->server, $this->login, $this->passwd);
		if (!mysql_select_db($this->base, $this->con)) {
			return false;
		}
		return $this->con;
	}
	
	public function query($query, $tableauParams){
		if (is_array($tableauParams)) {	
			foreach ($tableauParam as $nom => $param) {
				$valeurParam = $param["VALEUR"];
				$nomParam = $param["NOM"];
				$typeParam = $param["TYPE"];
				if ($typeParam == self::BIND_TYPE_NUM || $typeParam == Db::BIND_TYPE_INT) {
					$query = str_replace(':' . $nomParam, $valeurParam, $this->_lastQuery);
				} elseif ($typeParam == self::BIND_TYPE_STR || $typeParam == Db::BIND_TYPE_STR) {
					$query = str_replace(':' . $nomParam, $this->quoteSql($valeurParam), $query);
				} elseif (is_numeric($valeurParam) || strtoupper($valeurParam) == "NULL") {
					$query = str_replace(':' . $nomParam, $valeurParam, $query);
				} else {
					$query = str_replace(':' . $nomParam, $this->quoteSql($valeurParam), $query);
				}
			}
		}
		$result = mysql_query($query, $this->con);	
		if($result === true){
			$tabRetour = 1;
		}else if($result){
			while ($row = mysql_fetch_array($this->_parsedQuery, $this->fetchmode)) {
				$tabRetour[] = $row;
			}
		}else{
			return false;
		}
		return $tabRetour;
	}
	
	function quoteSql($str) {
		$newString = utf8_decode($str);
		return "'".mysql_escape_string($newString)."'";
	}
}

?>
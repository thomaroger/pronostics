<?php

class PrognosisMap{
	
	private $tableName = 'Prognosis';
  
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}

	public function insertSQL($prognosis){
		$tabParams = array();
		$query = "INSERT INTO ".$this->getTableName()." 
				  VALUES('', :Game_Id, :User_Id, :Prognosis_Team1, :Prognosis_Team2, :Prognosis_Win)";
		$this->app->db->addArrayParamsQuery($tabParams, 'Game_Id', $prognosis['Game_Id'], Db::BIND_TYPE_INT);
		$this->app->db->addArrayParamsQuery($tabParams, 'User_Id', $prognosis['User_Id'], Db::BIND_TYPE_INT);
		$this->app->db->addArrayParamsQuery($tabParams, 'Prognosis_Team1', (int) $prognosis['Prognosis_Team1'], Db::BIND_TYPE_STR);
		$this->app->db->addArrayParamsQuery($tabParams, 'Prognosis_Team2', (int) $prognosis['Prognosis_Team2'], Db::BIND_TYPE_STR);
		$this->app->db->addArrayParamsQuery($tabParams, 'Prognosis_Win', $prognosis['Prognosis_Win'], Db::BIND_TYPE_STR);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
		return $result;
	}

}

?>
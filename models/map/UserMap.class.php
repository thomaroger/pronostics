<?php

class UserMap{
	
	private $tableName = 'User';
  
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function identifySQL($email, $password){
		$tabParams = array();
		$query = "SELECT * 
				  FROM ".$this->getTableName()." 
				  WHERE User_Email = :email
				  AND User_Password = :password";
		$this->app->db->addArrayParamsQuery($tabParams, 'email', $email, Db::BIND_TYPE_STR);
		$this->app->db->addArrayParamsQuery($tabParams, 'password', $password, Db::BIND_TYPE_STR);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
}

?>
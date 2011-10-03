<?php


class ChampionshipMap{
	
	private $tableName = 'Championship';
	private $tableNameUser = 'Championship_has_User';
	private $tableNameType = 'GameType';
  
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getTableNameUser(){
			return $this->tableNameUser;
	}
	
	public function getTableNameType(){
		return $this->tableNameType;
	}
	
	
	public function getChampionshipsByUserSQL($user){
		$tabParams = array();
		$query = "SELECT * 
				  FROM ".$this->getTableName()." c, ".$this->getTableNameUser()." cu, ".$this->getTableNameType()." gt
				  WHERE c.Championship_Id = cu.Championship_Id
				  AND gt.GameType_Id = c.GameType_Id
				  AND cu.User_Id = :user_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'user_id', $user->getUserId(), Db::BIND_TYPE_INT);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
}

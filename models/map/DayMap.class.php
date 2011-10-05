<?php

class DayMap{
	
	private $tableName = 'Day';
	private $tableNameGame = 'Game';
  
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	public function getTableNameGame(){
		return $this->tableNameGame;
	}

	public function getDayByIdSQL($day_id){
		$tabParams = array();
		$query = "SELECT * 
				  FROM ".$this->getTableName() ."
				  WHERE Day_Id = :day_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'day_id', $day_id, Db::BIND_TYPE_INT);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
	

	public function getGamesSQL($day){
		$this->app = App::getInstance();
		$tabParams = array();
		$query = "SELECT * 
				  FROM ".$this->getTableNameGame() ."
				  WHERE Day_Id = :day_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'day_id', $day->getDayId(), Db::BIND_TYPE_INT);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
}

?>
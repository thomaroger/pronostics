<?php

class DayMap{
	
	private $tableName = 'Day';
	private $tableNameGame = 'Game';
    private $tableNamePrognosis = 'Prognosis';
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	public function getTableNameGame(){
		return $this->tableNameGame;
	}
	public function getTableNamePrognosis(){
		return $this->tableNamePrognosis;
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
	
	public function isPrognosisSQL($user){
		$this->app = App::getInstance();
		$tabParams = array();
		$query = "SELECT count(*) as COUNT
				  FROM ".$this->getTableNamePrognosis() ."
				  WHERE Game_id IN (:game_id)
				  AND User_id = :user_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'game_id', $this->getGamesId(), Db::BIND_TYPE_INT);
		$this->app->db->addArrayParamsQuery($tabParams, 'user_id', $user->getUserId(), Db::BIND_TYPE_INT);
		
		$result = $this->app->db->query($query,$tabParams);
		return ($result[0]['COUNT'] > 0);
	}
	
	public function getPrognosisSQL($user){
		$this->app = App::getInstance();
		$tabParams = array();
		$query = "SELECT *
				  FROM ".$this->getTableNamePrognosis() ."
				  WHERE Game_id IN (:game_id)
				  AND User_id = :user_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'game_id', $this->getGamesId(), Db::BIND_TYPE_INT);
		$this->app->db->addArrayParamsQuery($tabParams, 'user_id', $user->getUserId(), Db::BIND_TYPE_INT);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
}

?>
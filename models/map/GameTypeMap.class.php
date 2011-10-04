<?php

class GameTypeMap{
	
	private $tableName = 'GameType';
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getGameTypeSQL($championship){
		$tabParams = array();
		$query = "SELECT * 
				  FROM ".$this->getTableName() ."
				  WHERE GameType_Id = :gt_id";
		$this->app->db->addArrayParamsQuery($tabParams, 'gt_id', $championship->getChampionshipTypeGameId(), Db::BIND_TYPE_INT);
		$result = $this->app->db->query($query,$tabParams);
		return $result;
	}
	
}

?>
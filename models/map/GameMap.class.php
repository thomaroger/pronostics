<?php

class GameMap{
	
	private $tableName = 'Game';
  
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}


}

?>
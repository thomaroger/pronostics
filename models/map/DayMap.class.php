<?php

class DayMap{
	
	private $tableName = 'Day';
  
	 
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function getTableName(){
		return $this->tableName;
	}

}

?>
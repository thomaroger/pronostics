<?php

class GameType extends GameTypeMap{

  private $tableName = 'GameType';
  
  private $gameTypeId;
  private $name;
  
  public function getGameTypeId(){
    return $this->gameTypeId;
  }
  
  public function getName(){
    return $this->name;
  }
  
  public function setGameTypeId($id){
    $this->gameTypeId = $id;
  }
  
  public function setName($name){
    $this->name = $name;
  }
  
  public function setGameType($result){
  	 $this->setGameTypeId($result[0]['GameType_Id']);
  	 $this->setName($result[0]['GameType_Name']);
  }
  
  public function getGameType($championship){
  	$resultTab = $this->getGameTypeSQL($championship);
    $instGameType = new self();
	unset($instGameType->app);
	$instGameType->setGameType($resultTab);
	return $instGameType;
  }
  
}

?>
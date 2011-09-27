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
  
  public function setName($name){
    $this->name = $name;
  }
  
}

?>
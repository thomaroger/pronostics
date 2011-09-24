<?php

class GameType{

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
    
  public function __construct($gameTypeId = null){
    
    if(!empty($gameTypeId)){
      $this->findOne($gameTypeId);
    }
    
  }
  
  public function save(){}
  public function findOne($gameTypeId){}
  

}

?>
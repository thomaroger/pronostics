<?php 
class Prognosis extends PrognosisMap{
  
  private $prognosisId;
  private $gameId;
  private $userId;
  private $prognosisTeam1;
  private $prognosisTeam2;
  private $prognosisWin;
  
  public function setPrognosisId($prognosisId){
  	$this->prognosisId = $prognosisId;
  }
  public function setGameId($gameId){
  	$this->gameId = $gameId;
  }
  public function setUserId($userId){
  	$this->userId = $userId;
  }
  public function setPrognosisTeam1($prognosisTeam1){
  	$this->prognosisTeam1 = $prognosisTeam1;
  }
  public function setPrognosisTeam2($prognosisTeam2){
  	$this->prognosisTeam2 = $prognosisTeam2;
  }
  public function setPrognosisWin($prognosisWin){
  	$this->prognosisWin = $prognosisWin;
  }
  
  public function getPrognosisId(){
  	return $this->prognosisId;
  }
  public function getGameId(){
  	return $this->gameId ;
  }
  public function getUserId(){
  	return $this->userId;
  }
  public function getPrognosisTeam1(){
  	return $this->prognosisTeam1;
  }
  public function getPrognosisTeam2(){
  	return $this->prognosisTeam2;
  }
  public function getPrognosisWin(){
  	return $this->prognosisWin;
  }
  

  public function setPrognosis($prognosis){

  }
  
  public function insert($prognosis){
  	return $this->insertSQL($prognosis);
  }
  
}
?>
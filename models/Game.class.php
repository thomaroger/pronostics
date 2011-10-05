<?php 
class Game extends GameMap{
  
  private $gameId;
  private $dayId;
  private $gameTeam1;
  private $gameTeam2;
  
  public function setGameId($gameId){
  	$this->gameId = $gameId;
  }
	public function setDayId($dayId){
  	$this->dayId = $dayId;
  }
	public function setGameTeam1($gameTeam1){
  	$this->gameTeam1 = $gameTeam1;
  }
	public function setGameTeam2($gameTeam2){
  	$this->gameTeam2 = $gameTeam2;
  }
  
	public function getGameId(){
  	return $this->gameId;
  }
	public function getDayId(){
  	return $this->dayId;
  }
	public function getGameTeam1(){
  	return $this->gameTeam1;
  }
	public function getGameTeam2(){
  	return $this->gameTeam2;
  }
  

  public function setGame($game){
 	$this->setGameId($game['Game_Id']);
  	$this->setDayId($game['Day_Id']);
  	$this->setGameTeam1($game['Game_Team1']);
  	$this->setGameTeam2($game['Game_Team2']);
  }
  
}
?>
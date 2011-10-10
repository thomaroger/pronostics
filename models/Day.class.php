<?php 
class Day extends DayMap{
  
  const STATUT_LIVE = 0;
  const STATUT_EXPIRED = 1;	
  
  public static $statuses = array(self::STATUT_LIVE => 'en cours',
  								  self::STATUT_EXPIRED => 'expire');
	
  private $dayId;
  private $championshipId;
  private $name;
  private $prognosisBegin;
  private $prognosisEnd;
  private $status;
  
  
  public function setDayId($id){
  	$this->dayId = $id;
  }

  public function setChampionshipId($id){
  	$this->championshipId  = $id;
  }

  public function setName($name){
  	$this->championshipId = $name;
  }

  public function setPrognosisBegin($date){
  	$this->prognosisBegin = $date;
  }

  public function setPrognosisEnd($date){
  	$this->prognosisEnd = $date;
  }

  public function setStatus($state){
  	$this->status = $state;
  }
  
  public function getDayId(){
  	return $this->dayId;
  }

  public function getChampionshipId(){
  	return $this->championshipId;
  }

  public function getName(){
  	return $this->championshipId ;
  }

  public function getPrognosisBegin(){
  	return $this->prognosisBegin;
  }

  public function getPrognosisEnd(){
  	return $this->prognosisEnd;
  }

  public function getStatus(){
  	return $this->status;
  }
  
  public function setDay($day){
  	$this->setDayId($day['Day_Id']);
  	$this->setChampionshipId($day['Championship_Id']);
  	$this->setName($day['Day_Name']);
  	$this->setPrognosisBegin($day['Day_Prognosis_Begin']);
  	$this->setPrognosisEnd($day['Day_Prognosis_End']);
  	$this->setStatus($day['Day_Status']);
  }
  
 public function getDayById($dayId){
  	$resultTab = $this->getDayByIdSQL($dayId);
    $instDay = new self();
	unset($instDay->app);
	$instDay->setDay($resultTab[0]);
	return $instDay;
  }
 
  public function getGames(){
  	$results = array();
  	$resultsTab = $this->getGamesSQL($this);
  	foreach($resultsTab as $resultTab){
	    $instGame = new Game();
		unset($instGame->app);
		$instGame->setGame($resultTab);
		$results[] = $instGame;
  	}
	return $results;
  }
  
  public function getGamesId(){
  	$resultsTab = $this->getGamesSQL($this);
  	$str = "";
  	foreach($resultsTab as $resultTab){
  		$str .=$resultTab['Game_Id'].",";
  	}
  	return trim($str, ',');
  }
  
  public function isPrognosis($user){
  	return $this->isPrognosisSQL($user);
  }
  
  public function getPrognosis($user){
  	return $this->getPrognosisSQL($user);
  }
  
  public function decorate($prognosis){
  	$results = array();
  	foreach($prognosis as $prognosi){
  		$results[$prognosi['Game_Id']] = array('TEAM1' => $prognosi['Prognosis_Team1'],
  						 						 'TEAM2'=> $prognosi['Prognosis_Team2']);
  	}
  	return $results;
  }
}
?>
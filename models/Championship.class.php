<?php

class Championship extends ChampionshipMap {

	private $championshipId;
	private $championshipTypeGameId;
	private $championshipName;
	private $championshipDateBegin;
	
	public function setChampionshipId($id){
		$this->championshipId = $id;
	}
	
	public function setChampionshipTypeGameId($id){
		$this->championshipTypeGameId = $id;
	}
	
	public function setChampionshipName($name){
		$this->championshipName = $name;
	}
	
	public function setChampionshipDateBegin($date){
		$this->championshipDateBegin = $date;
	}
	
	public function getChampionshipId(){
		return $this->championshipId;
	}
	
	public function getChampionshipTypeGameId(){
		return $this->championshipTypeGameId;
	}
	
	public function getChampionshipName(){
		return $this->championshipName;
	}
	
	public function getChampionshipDateBegin(){
		return $this->championshipDateBegin;
	}

	
	public function setChampionship($championship){
  		$this->setChampionshipId($championship['Championship_Id']);
	  	$this->setChampionshipTypeGameId($championship['GameType_Id']);
  		$this->setChampionshipName($championship['Championship_Name']);
  		$this->setChampionshipDateBegin($championship['Championship_Begin']);
  	}
	
  	
	public function getChampionshipsByUser($user){
		$results = array();
		$resultsTab = $this->getChampionshipsByUserSQL($user);
		
		foreach($resultsTab as $resultTab) {
			$instChampionship = new self();
			unset($instChampionship->app);
			$instChampionship->setChampionship($resultTab);
			$results[] = $instChampionship; 
		}
		return $results;
	}
	
	public function getGameType(){
		$instGameType = new GameType();
		return $instGameType->getGameType($this);
	}
	
	public function getDays(){
		$results = array();
		$resultsTab = $this->getDaysSQL();
		foreach($resultsTab as $resultTab) {
			$instDay = new Day();
			unset($instDay->app);
			$instDay->setDay($resultTab);
			$results[] = $instDay; 
		}
		return $results;
	}

}

?>
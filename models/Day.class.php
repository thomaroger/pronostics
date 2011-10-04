<?php 
class Day extends DayMap{
  
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
 
}
?>
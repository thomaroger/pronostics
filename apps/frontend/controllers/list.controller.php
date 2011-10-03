<?php
class listController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
    	$userCourant = User::getUser();
		$instChampionship = new Championship();
		$championnships = $instChampionship->getChampionshipsByUser($userCourant);
		var_dump($championnships);
	}
}
?>
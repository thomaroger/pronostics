<?php
class listController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
    	$userCourant = User::getUser();
		$instChampionship = new Championship();
		$championships = $instChampionship->getChampionshipsByUser($userCourant);
		$this->app->context->championships = $championships;
		
	}
}
?>
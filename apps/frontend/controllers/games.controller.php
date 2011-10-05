<?php
class gamesController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
    	$userCourant = User::getUser();
		$dayId = $this->app->request->getParameter('day');
		$instDay = new Day();
		$day = $instDay->getDayById($dayId); 
		var_dump($day);
		var_dump($day->getGames());
	}
}
?>
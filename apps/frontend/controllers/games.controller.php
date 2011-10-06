<?php
class gamesController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
		$userCourant = User::getUser();
		
		$flag = $this->app->request->getParameter('pronosFlag');
		if($flag){
			$dayId = $this->app->request->getParameter('pronosDay');
			$instDay = new Day();
			$day = $instDay->getDayById($dayId);
			$games = $day->getGames();
			foreach ($games as $game){
				$prognosis = $this->app->request->getParameter('pronos',$game->getGameId());
				$prognosisWin = "";
				if($prognosis['team1'] > $prognosis['team2']){
					$prognosisWin = $game->getGameTeam1();
				}else if($prognosis['team1'] < $prognosis['team2']){
					$prognosisWin = $game->getGameTeam2();
				}else{
					$prognosisWin = 'nul';
				}
				/*$instPrognosis = new Prognosis();
				$instPrognosis->insert();*/
				var_dump($prognosis);
				var_dump($prognosisWin);
			}
		}
		
    	
		$dayId = $this->app->request->getParameter('day');
		$instDay = new Day();
		$day = $instDay->getDayById($dayId); 
		$this->app->context->day = $day;
		$this->app->context->games = $day->getGames();
	}
	
	public function savePrognosis(){
		var_dump($this);
		$userCourant = User::getUser();
		var_dump($userCourant->getUserId());
		
	}
}
?>
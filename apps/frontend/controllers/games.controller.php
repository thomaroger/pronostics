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
		if($day->getStatus() == 1) {
			$this->app->redirect("frontend","list");
		}
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
				$prognosisTab = array('Game_Id' => $game->getGameId(),
									  'User_Id' => $userCourant->getUserId(),
									  'Prognosis_Team1' => $prognosis['team1'],
									  'Prognosis_Team2' => $prognosis['team2'],
									  'Prognosis_Win' => $prognosisWin);
				$instPrognosis = new Prognosis();
				
				if ($instPrognosis->insert($prognosisTab)) {
					$this->app->redirect("frontend","list");
				}			
			}
		}
		
		$this->app->context->day = $day;
		$this->app->context->games = $day->getGames();
	}
}
?>
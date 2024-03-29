<?php 
	$app = App::getInstance();
	$ctx = $app->getContext();
	$err = $app->getError();	
?>

<?php 
	foreach ($ctx->championships as $championship){
		echo $championship->getChampionshipName()." - ".$championship->getGameType()->getName()."<br />";
		$days = $championship->getDays();
		if(count($days) == 0 ){
			echo 'Pas de journée pour ce championnat';
		}
		foreach($days as $day){
			echo "<a href='/frontend/games?day=".$day->getDayId()."'>".$day->getName()." - ".Day::$statuses[$day->getStatus()]."</a>";
			if($day->isPrognosis($ctx->user)){
				echo "  - deja pronostiqué";	
			}
			echo "<br /><br />";
		}
		echo "<br />";
	}
?>
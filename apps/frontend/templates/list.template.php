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
			echo $day->getName()." ".$day->getStatus()."<br /><br />";
		}
		echo "<br />";
	}
?>
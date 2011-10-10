<?php 
	$app = App::getInstance();
	$ctx = $app->getContext();
	$err = $app->getError();	
?>
<div>
	<form action="" name="prognosis" method="post">
		<?php 
			echo $ctx->day->getName()."<br />";
			foreach ($ctx->games as $game){
				echo $game->getGameTeam1(); 
				$resultTeam1 = 0;
				$resultTeam2 = 0;
				if(!empty($ctx->prognosis[$game->getGameId()]['TEAM1']) || $ctx->prognosis[$game->getGameId()]['TEAM1'] == 0) {
					echo " ".$ctx->prognosis[$game->getGameId()]['TEAM1']." - ".$ctx->prognosis[$game->getGameId()]['TEAM2']." ".$game->getGameTeam2()."<br />";
					continue;
				}
				
				?>
				<input type="text" name="pronos[<?php echo $game->getGameId()?>][team1]" value="<?php echo $resultTeam1;?>"/>
				-
				<input type="text" name="pronos[<?php echo $game->getGameId()?>][team2]" value="<?php echo $resultTeam2;?>" />
				<?php 
				echo $game->getGameTeam2();
				echo "<br />";
			}
		?>
		<?php if(!(!empty($ctx->prognosis[$game->getGameId()]['TEAM1']) || $ctx->prognosis[$game->getGameId()]['TEAM1'] == 0)) { ?>
		<input type="hidden" name="pronosFlag" value="1" />
		<input type="hidden" name="pronosDay" value="<?php echo $ctx->day->getDayId(); ?>" />
		<input type="submit" name="" />
		<?php }?>
	</form>
</div>
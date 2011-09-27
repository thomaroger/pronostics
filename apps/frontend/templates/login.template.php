<?php 
	$app = App::getInstance();
	$ctx = $app->getContext();
	$err = $app->getError();	
?>
<?php
	if(!($ctx->isConnected)){
		echo $err->getLevel()." ".$err->getMessage();
	}
	$user = User::getUser();
	var_dump($user);
?>

<div id="login">
  <h2>Ecran de connexion</h2>
  <form action="" name="connexion" method="post">
    <div class="ligne">
      <label for="email"> Email : </label>
      <input type="text" name="connexion[email]" id="email" />
    </div>
    <div class="ligne">
      <label for="password"> Mot de passe : </label>
      <input type="password" name="connexion[password]" id="password" />
    </div>
    <div class="ligne">
      <input type="submit" value="connexion" />
    </div>
  </form>
</div>


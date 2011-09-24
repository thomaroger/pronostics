<?php 
  require_once ('../commons/configuration/config.php');
  require_once ('../commons/scripts/app.php');

  $url = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  $path = explode('/',$url['path']);
  if(count($path) == 3){
    $app->autoload->autoloadAction($path[1],$path[2]);
  }else{
    $app->autoload->autoloadAction(APP_DEFAULT, ACTION_DEFAULT);
  }
  

  $app->generateFooter();
?>
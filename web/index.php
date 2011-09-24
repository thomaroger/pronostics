<?php 
  require_once ('../commons/configuration/config.php');
  require_once ('../commons/scripts/app.php');
  
  $app->handleHeader();
  $app->handleContent();
  $app->handleFooter();
?>
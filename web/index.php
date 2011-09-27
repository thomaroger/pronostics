<?php 
  session_start();
  require_once('../commons/configuration/config.php');
  require_once(WEBROOT.'/commons/scripts/app.php');
 
  $app->handleHeader();
  $app->handleContent();
  $app->handleFooter();
?>
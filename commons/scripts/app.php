<?php
require_once(WEBROOT.'/commons/class/App.class.php');
$app = App::getInstance();
$app->db =  Db::getInstance();
$app->request = Request::getInstance();
$app->error = Error::getInstance();
$app->context = Context::getInstance();
?>
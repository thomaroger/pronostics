<?php
$app = App::getInstance();
$email = $app->request->getParameter('connexion','email');
if(!empty($email)) {
  var_dump($email);
}
?>
<?php
class loginController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
		$this->app->context->isConnected  = false;
		$email = $this->app->request->getParameter('connexion','email');
		$password = $this->app->request->getParameter('connexion','password');
		if(!empty($email) && !empty($password)) {
  			$user = new User();
  			$isConnected  = $user->identify($email, $password);
  			$this->app->context->isConnected  = $isConnected;
  			if(!$isConnected){
  				$this->app->error->setError(0,"Identifiants incorrects",Error::LOG_ERROR);
  			}
		}
	}
}
?>
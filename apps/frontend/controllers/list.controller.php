<?php
class listController{
	
	public $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	public function action(){
    $userCourant = User::getUser();
  	var_dump($userCourant);		
	}
}
?>
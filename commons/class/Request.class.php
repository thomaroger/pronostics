<?php
class Request{
	private static $instance;
	
	public static function getInstance() {
 
   		if(is_null(self::$instance)) {
			self::$instance = new Request();  
     	}
 
     	return self::$instance;
   }
	
	public function getParameter($form, $name = null){
		if(!empty($name)){
			if(key_exists($form, $_POST)){
				return $_POST[$form][$name];
			}
			if(key_exists($form, $_GET)){
				return $_GET[$form][$name];
			}
		}else{
			if(key_exists($form, $_POST)){
				return $_POST[$form];
			}
			if(key_exists($form, $_GET)){
				return $_GET[$form];
			}
		}
	}
}
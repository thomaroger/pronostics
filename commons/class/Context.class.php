<?php
class Context{

	private static $instance;
	
	public static function getInstance() {
 
   		if(is_null(self::$instance)) {
			self::$instance = new Context();  
     	}
 
     	return self::$instance;
   }
	
}
?>
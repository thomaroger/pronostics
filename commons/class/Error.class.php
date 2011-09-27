<?php
class Error{
	
	const LOG_ERROR = 1;
	const LOG_WARNING = 2;
	const LOG_NOTICE = 3;
	
	public static $logs = array(self::LOG_ERROR => 'erreur',
								self::LOG_WARNING => 'avertissement',
								self::LOG_NOTICE => 'notice');
	
	private static $instance;
	public $code;
	public $message;
	public $level;
	
	public static function getInstance() {
 
   		if(is_null(self::$instance)) {
			self::$instance = new Error();  
     	}
 
     	return self::$instance;
   }
	
   
   public function setCode($code){
  	 $this->code = $code;
   }
   public function getCode(){
     return $this->code;
   }
   
  public function setMessage($message){
  	 $this->message = $message;
   }
   public function getMessage(){
     return $this->message;
   }
   
  public function setLevel($level){
  	 $this->level = $level;
   }
   public function getLevel(){
     return $this->level;
   }
   
	public function setError($code,$message,$level){
		$this->setCode($code);  
		$this->setMessage($message); 
		$this->setLevel($level); 
	}
}
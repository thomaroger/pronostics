<?php 
class User extends UserMap{
  
  public static $namespace = 'Namespace_User';
 
  private $userId;
  private $email;
  private $password;
  private $name;
  private $lastname;
  
  public function getUserId(){
    return $this->userId;
  }
  
  public function getEmail(){
    return $this->email;
  }
  
  public function getPassword(){
    return $this->password;
  }
  
  public function getName(){
    return $this->name;
  }
  
  public function getLastName(){
    return $this->lastName;
  }
  
 public function setUserId($userId){
    $this->userId = $userId;
  }
  
  public function setEmail($email){
    $this->email = $email;
  }
  
  public function setPassword($password){
    $this->password = $password;
  }
  
  public function setName($name){
    $this->name = $name;
  }
  
  public function setLastName($lastName){
   $this->lastName = $lastName;
  }
  
  
  public function identify($email, $password){
  	$user = $this->identifySQL($email,md5($password));
  	if(count($user) == 1){
  		$this->setUser($user[0]);
  		$this->setSession();
  		return true;
  	}
  	return false;
  }
  
  public function setUser($user){
  	$this->setUserId($user['User_Id']);
  	$this->setEmail($user['User_Email']);
  	$this->setName($user['User_Name']);
  	$this->setLastName($user['User_Lastname']);
  }
  
  public function setSession(){
  	unset($this->app);
  	$_SESSION[self::$namespace] = serialize($this);
  }
  
  public static function getUser(){	
  	if(empty($_SESSION[self::$namespace])){
  		return false;
  	}
    $user = unserialize($_SESSION[self::$namespace]);
    return $user;
  }
}
?>
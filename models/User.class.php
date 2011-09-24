<?php 
class User{
  
  private $tableName = 'User';

  
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
  
  public function __construct($userId = null){
    
    if(!empty($userId)){
      $this->findOne($userId);
    }
    
  }
  
  public function save(){}
  public function findOne($userId){}
  

}
?>
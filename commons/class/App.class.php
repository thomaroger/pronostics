<?php

require_once(WEBROOT.'/commons/class/Autoload.class.php');

class App {
  
  public $autoload;
  
  public function __construct(){
    $this->autoload();
  }
  
  public function autoload(){
    $this->autoload = new Autoload();
  }
  
  public function handleHeader(){
    if(file_exists(COMMONS_HEADER)){
      require_once(COMMONS_HEADER);
    }
  }
  
  public function handleFooter(){
    if(file_exists(COMMONS_HEADER)){
      require_once(COMMONS_FOOTER);
    }
  }
  
  public function handleContent(){
    $url = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = explode('/',$url['path']);
    $count = count($path);
    if($count == 3){
      $this->autoload->autoloadAction($path[1],$path[2]);
    }else {
      $this->autoload->autoloadAction(APP_DEFAULT, !empty($path[1])?$path[1]:ACTION_DEFAULT); 
    }
  }
}

?>
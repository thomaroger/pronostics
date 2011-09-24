<?php

require_once(WEBROOT.'/commons/class/Autoload.class.php');

class App {
  
  public function __construct(){
    $this->autoload();
    $this->generateHeader();
  }
  
  public function autoload(){
    $autoload = new Autoload();
  }
  
  public function generateHeader(){
    if(file_exists(COMMONS_HEADER)){
      require_once(COMMONS_HEADER);
    }
  }
  
  public function generateFooter(){
    if(file_exists(COMMONS_HEADER)){
      require_once(COMMONS_FOOTER);
    }
  }
}

?>
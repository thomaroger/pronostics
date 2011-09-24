<?php

class App {
  
  public function __construct(){
    $this->autoload();
    $this->generateHeader();
  }
  
  public function autoload(){
  
  }
  
  public function generateHeader(){
  
    require_once(COMMONS_HEADER);
  }
  
  public function generateFooter(){
    require_once(COMMONS_FOOTER);
  }
}

?>
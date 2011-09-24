<?php

class Autoload{

  public function __construct(){
    $this->autoloadModel();
    $this->autoloadClassUtils();
  }
  
  public function autoloadModel(){
    $this->requireAllFileInDirectory(WEBROOT.'/models/');
  }
  
  public function autoloadClassUtils(){
  }
  
  public function autoloadAnotherFile(){
  }
  
  public function requireAllFileInDirectory($directory){
    if(file_exists($directory)){
      if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if (!in_array($file, array('.','..'))) {
              require_once($directory.$file);
            }
        }
        closedir($handle);
      }
    }
  }
}

?>
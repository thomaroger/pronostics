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
  
  public function autoloadAction($app, $name){
    $controller = WEBROOT.'/apps/'.$app.'/controllers/'.$name.'.controller.php';
    $template = WEBROOT.'/apps/'.$app.'/templates/'.$name.'.template.php';
    if(file_exists($controller) && file_exists($template)) {
      $this->autoloadAnotherFile($controller);
      $this->autoloadAnotherFile($template);
    }
  }
  
  public function autoloadAnotherFile($path){
    require_once($path);
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
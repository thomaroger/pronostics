<?php

class Autoload{

  public function __construct(){
  	$this->autoloadMap();
    $this->autoloadModel();
    $this->autoloadClassUtils();
  }
  
  public function autoloadMap(){
  	  $this->requireAllFileInDirectory(WEBROOT.'/models/map/');
  }
  
  public function autoloadModel(){
  	$this->requireAllFileInDirectory(WEBROOT.'/models/');
   
  }
  
  public function autoloadClassUtils(){
  	$this->autoloadAnotherFile(WEBROOT.'/commons/class/Db.class.php');
  	$this->autoloadAnotherFile(WEBROOT.'/commons/class/Request.class.php');
  	$this->autoloadAnotherFile(WEBROOT.'/commons/class/Error.class.php');
  	$this->autoloadAnotherFile(WEBROOT.'/commons/class/Context.class.php');
  }
  
  public function autoloadAction($apps, $name){
    $controller = WEBROOT.'/apps/'.$apps.'/controllers/'.$name.'.controller.php';
    $template = WEBROOT.'/apps/'.$apps.'/templates/'.$name.'.template.php';
    if(file_exists($controller) && file_exists($template)) {
      $this->autoloadAnotherFile($controller);
      $db = $name."Controller";
      $actionController = new $db();
      $actionController->action();
      $this->autoloadAnotherFile($template);
    }
  }
  
  public function autoloadAnotherFile($path){
  	if(file_exists($path)) {
    	require_once($path);
  	}
  }
  
  public function requireAllFileInDirectory($directory){
    if(file_exists($directory)){
      if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if (!in_array($file, array('.','..')) && !is_dir($directory.$file)) {
              require_once($directory.$file);
            }
        }
        closedir($handle);
      }
    }
  }
}

?>
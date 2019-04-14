<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  function __construct()
  {
    $url = $this->getUrl();
    //var_dump($this->getUrl());

    $controller = '../app/controllers/'.ucwords($url[0]).'.php';
    //die($controller);
    //lets get controller
    if (file_exists($controller)) {
      //die ("1");
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }

    require_once('../app/controllers/'. $this->currentController.'.php');
    
    $this->currentController = new $this->currentController;

   
    //let get method if its present
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }

    //note: we got controller and we got method(for view)
    //now lets get params
    
    $params = $url ? array_values($url): [];
    
    //lets invoke target controller with target method
    call_user_func_array([$this->currentController,$this->currentMethod], $params);

  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}

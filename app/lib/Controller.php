<?php
// main Controller class

class Controller{ 
 
  public function model($model){

    require_once '..app/models/'.$model.'.php';
    return new $model;
  }


  public function view($url, $data=[]){
    if (file_exists('../app/views/'.$url.'.php')) {
      require_once '../app/views/'.$url.'.php';
    }else{
      return ("sorry view does not found");
    }
  }
}

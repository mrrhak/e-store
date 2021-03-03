<?php
// Load Model and View
class Controller{

  // Load the model
  public function model($model){
    // Require model file
    require_once '../app/models/'.$model.'.php';
    // instantiate model
    return new $model();
  }

  // Load the view
  public function view($view, $data = []){
    if(file_exists('../app/views/'.$view.'.php')){
      require_once '../app/views/'.$view.'.php';
    }
    else{
      die('View does not exists.');
    }
  }
}
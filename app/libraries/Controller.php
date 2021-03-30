<?php
// Load Model and View
class Controller
{

  public Session $session;
  public function __construct()
  {
    $this->session = new Session();
  }

  // Load the model
  public function model($model)
  {
    // Require model file
    require_once '../app/models/' . $model . '.php';
    // instantiate model
    return new $model();
  }

  // Load the view
  public function view($view, $data = [])
  {
    foreach ($data as $key => $value) {
      $$key = $value;
    }

    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      if (file_exists('../app/views/' . $view . '/index.php')) {
        require_once '../app/views/' . $view . '/index.php';
      } else {
        die('View does not exists.');
      }
    }
    
  }
}

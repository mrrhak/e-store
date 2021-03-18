<?php
  // Core App Class
  class Core{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();

      // Look in controllers at first array
      if(isset($url[0])){
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
          // Set new controller
          $this->currentController = ucwords($url[0]);
          unset($url[0]);
        }
      }

      // Require controller
      require_once '../app/controllers/'.$this->currentController.'.php';
      $this->currentController = new $this->currentController;

      // Look in method at second array
      if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }

      // Look in paramenters after second array
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        // Allow to filtter variable as string/number
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Breaking it into an array
        $url = explode('/', $url);
        return $url;
      }
    }
  }
  
 
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  



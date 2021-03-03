<?php
  class Home extends Controller{
    public function __construct(){
      // $this->userModel = $this->model('User');
    }

    public function index(){
      // $users = $this->userModel->getUsers();
      $data = [
        'title' => 'Home Page Index',
      ];

      $this->view('frontend/index', $data);
    }
  }
?>
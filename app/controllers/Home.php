<?php
  class Home extends Controller{
    private $user;
    private $authUser;
    public function __construct(){
      parent::__construct(); // For init session
      $this->user = $this->model('User');
      if ($userId = $this->session->get('user_id')) {
        $result =  $this->user->findUserById($userId);
        $this->authUser = $result;
        if( $this->authUser == null){
          header('location: ' . URLROOT.'/auth/logout');
        }
      }
    }

    public function index(){
      $data = [
        'title' => 'Home',
        'page' => 'home', // For make menu active link
        'user' => $this->authUser,
      ];
      $this->view('frontend/index', $data);
    }
  }
?>
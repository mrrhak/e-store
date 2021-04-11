<?php
class Auth extends Controller
{
  private $user;

  public function __construct(){
    parent::__construct(); // For init session
    $this->user = $this->model('User');

    if ($userId = $this->session->get('user_id')) {
      $result =  $this->user->findUserById($userId);
      $this->authUser = $result;
      if( $this->authUser == null){
        header('location: ' . URLROOT.'/auth/logout');
      }
       if($this->user->role == 'admin'){
        header('location: ' . URLROOT.'/dashboard');
       }
       else{
         header('location: ' . URLROOT);
       }
       
    }
  }

  public function index(){
    header('location:' . URLROOT . '/auth/login');
  }


  public function login(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      return $this->loginSubmit();
    }

    $data = [
      'title' => 'Admin Login',
    ];
    return $this->view('backend/auth/login', $data);
  }

  private function loginSubmit(){
    // Sanitize post date prevent sql injection
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
      ];

      // Validate username
      if(empty($data['username'])){
        $data['usernameError'] = 'Please enter a username';
      }

      // Validate password
      if(empty($data['password'])){
        $data['passwordError'] = 'Please enter a password';
      }

      //Check if all errors are empty
      if (empty($data['usernameError']) && empty($data['passwordError'])) {
        $loggedInUser = $this->user->login($data['username'], $data['password']);

        if ($loggedInUser) {
          $this->createUserSession($loggedInUser, '/dashboard');
        } else {
          $data['passwordError'] = 'Password or username is incorrect';

          $this->view('backend/auth/login', $data);
        }
      }

  }

  public function createUserSession($user, $route){
    $this->session->set('user_id', $user->id);
    $this->session->set('username', $user->username);

    header('location:'.URLROOT.$route);
  }

  public function logout(){
    $this->session->remove('user_id');
    $this->session->remove('username');
    header('location:' . URLROOT . '/auth/login');
  }
}



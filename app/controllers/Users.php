<?php
class Users extends Controller{
  public function __construct(){
    parent::__construct();
    $this->userModel = $this->model('User');
  }

  public function register(){
    $data = [
      'title' => 'Register',
      'username' => '',
      'email' => '',
      'password' => '',
      'confirmPassword' => '',
      'usernameError' => '',
      'emailError' => '',
      'passwordError' => '',
      'confirmPasswordError' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Santize post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      print($_POST['username']);
      $data = [
        'title' => 'Register',
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirmPassword' => trim($_POST['confirmPassword']),
        'usernameError' => '',
        'emailError' => '',
        'passwordError' => '',
        'confirmPasswordError' => ''
      ];
      
      $nameValidation = "/^[a-zA-Z0-9]*$/";
      $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

      // Validate username on letter/number
      if(empty($data['username'])){
        $data['usernameError'] = 'Please enter username';
      }
      elseif(!preg_match($nameValidation, $data['username'])){
        $data['usernameError'] = 'Name can only contain letters and numbers';
      }

      // Validate email
      if(empty($data['email'])){
        $data['emailError'] = 'Please enter email address';
      }
      elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $data['emailError'] = 'Please enter the correct email';
      }
      else{
        // Check if email exists
        if($this->userModel->findUserByEmail($data['email'])){
          $data['emailError'] = 'Email is already taken';
        }
      }

      // Validate password on length and numeric value
      if(empty($data['password'])){
        $data['passwordError'] = 'Please enter password';
      }
      elseif(strlen($data['password']) < 6){
        $data['passwordError'] = 'Password must be at least 6 characters';
      }
      elseif(!preg_match($passwordValidation, $data['password'])){
        $data['passwordError'] = 'Password must have at least one numeric value';
      }

      // Validate confirm password on length and numeric value
      if(empty($data['confirmPassword'])){
        $data['confirmPasswordError'] = 'Please enter confirm password';
      }
      else{
        if($data['password'] != $data['confirmPassword']){
           $data['confirmPasswordError'] = 'Password do not match, please try again!';
        }
      }

      // Make sure that errors are empty
      if(empty($date['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // Register user from model function
        if($this->userModel->register($data)){
          // Redirect to the login page
          header('location:'.URLROOT.'/users/login');
        }
        else{
          die('Something went wrong!');
        }
      }

    }

    $this->view('frontend/users/register', $data);
  }

  public function login(){
    $data = [
      'title' => 'Login',
      'username' => '',
      'password' => '',
      'usernameError' => '',
      'passwordError' => ''
    ];

    //Check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize post date prevent sql injection
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => 'Login',
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'usernameError' => '',
        'passwordError' => ''
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
        $loggedInUser = $this->userModel->login($data['username'], $data['password']);

        if ($loggedInUser) {
          $this->createUserSession($loggedInUser);
        } else {
          $data['passwordError'] = 'Password or username is incorrect. Please try again.';

          $this->view('frontend/users/login', $data);
        }
      }
    }
    else{
      $data = [
        'username' => '',
        'password' => '',
        'usernameError' => '',
        'passwordError' => ''
      ];
    }

    $this->view('frontend/users/login', $data);
  }

  public function createUserSession($user){
    $this->session->set('user_id', $user->id);
    $this->session->set('username', $user->username);

    header('location:'.URLROOT);
  }

  public function logout() {
    $this->session->remove('user_id');
    $this->session->remove('username');
    header('location:' . URLROOT . '/users/login');
  }
}
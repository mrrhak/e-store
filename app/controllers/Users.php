<?php
class Users extends Controller{
  private $authUser;
  public function __construct(){
    parent::__construct();
    $this->userModel = $this->model('User');

    if ($userId = $this->session->get('user_id')) {
        $this->authUser = $this->userModel->findUserById($userId);
        if($this->authUser == null){
          $this->logout();
        }
    }
  }

  public function ajaxDetail($id)
  {
    header('Content-type: application/json');
    $user = $this->userModel->findUserById($id);
    http_response_code(200);
    echo json_encode($user);
  }

  public function ajaxUpdate($id){

    header('Content-type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Santize post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $errors = [];
      
      $nameValidation = "/^[a-zA-Z0-9]*$/";

      // Get User for check
      $user = $this->userModel->findUserById($id);
      
      if($user){
        
        $inputUsername = strtolower(trim($_POST['username']));
        // Validate username on letter/number
        if(empty($inputUsername)){
          $errors['usernameError'] = 'Please enter username';
        }
        elseif(!preg_match($nameValidation, $inputUsername)){
          $errors['usernameError'] = 'Username can only contain letters and numbers without space';
        }
        else{
          // If username change
          if(strcmp($user->username, $inputUsername) != 0){
            // Check if username exists
            if($this->userModel->findUserByUsername($inputUsername)){
              $errors['usernameError'] = 'Username is already taken';
            }
          }
        }

        $inputEmail = strtolower(trim($_POST['email']));
        // Validate email
        if(empty($inputEmail)){
          $errors['emailError'] = 'Please enter email address';
        }
        elseif(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)){
          $errors['emailError'] = 'Please enter the correct email';
        }
        else{
          // If username change
          if(strcmp($user->email, $inputEmail) != 0){
            // Check if email exists
            if($this->userModel->findUserByEmail($inputEmail)){
              $errors['emailError'] = 'Email is already taken';
            }
          }
        }

        $inputPassword = trim($_POST['password']);
        // If Change
        if(!empty($inputPassword)){
          // Validate password on length and numeric value
          if(strlen($inputPassword) < 6){
            $errors['passwordError'] = 'Password must be at least 6 characters';
          }
          else{
            // New password will save to db
             $inputPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
          }
        }
        else{
          // Old password will save to db
          $inputPassword = $user->password;
        }

        $inputRole = strtolower(trim($_POST['role']));
        if(empty($inputRole)){
          $errors['roleError'] = 'Please select a role';
        }

        // If have any errors
        if(!empty($errors)){
          http_response_code(404);
          echo json_encode([
              'errors' => $errors
          ]);
        }
        else{
          // Everything is OK
          $data = [
            'username' => $inputUsername,
            'email' => $inputEmail,
            'password' => $inputPassword,
            'role' => $inputRole,
          ];
          
          if($this->userModel->updateById($data, $id)){
            // Redirect to the login page
            http_response_code(202);
            echo json_encode($data);
          }
          else{
            http_response_code(404);
            echo json_encode(['message'=> 'Failed to update user']);
          }
        }
      }
      else{
        http_response_code(404);
        echo json_encode(['message'=> 'Failed to update user or it was deleted']);
      }
    }
    else{
      http_response_code(404);
      echo json_encode(['message'=> 'Failed']);
    }
  }

  public function ajaxDelete($id){

    header('Content-type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
      $errors = [];

      if(!isset($id)){
        $errors['deleteError'] = 'Please provide spacific user to delete';
      }
      // Make sure that errors are empty
      if(empty($errors)){
        if($this->userModel->deleteById($id)){
          http_response_code(201);
          echo json_encode([
            'message' => 'User deleted successfully',
          ]);
        }
        else{
          http_response_code(404);
          $errors['deleteError'] = 'Failed to delete user';
          echo json_encode([
            'errors' => $errors
        ]);
        }
      }
      else{
        http_response_code(404);
        echo json_encode([
            'errors' => $errors
        ]);
      }

    }
    else{
      http_response_code(404);
      echo json_encode(['message'=> 'Failed']);
    }
  }

  public function ajaxRegister(){

    header('Content-type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Santize post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'username' => strtolower(trim($_POST['username'])),
        'email' => strtolower(trim($_POST['email'])),
        'password' => trim($_POST['password']),
        'role' => strtolower(trim($_POST['role'])),
      ];

      $errors = [];
      
      $nameValidation = "/^[a-zA-Z0-9]*$/";

      // Validate username on letter/number
      if(empty($data['username'])){
        $errors['usernameError'] = 'Please enter username';
      }
      elseif(!preg_match($nameValidation, $data['username'])){
        $errors['usernameError'] = 'Username can only contain letters and numbers without space';
      }
      else{
        // Check if username exists
        if($this->userModel->findUserByUsername($data['username'])){
          $errors['usernameError'] = 'Username is already taken';
        }
      }


      // Validate email
      if(empty($data['email'])){
        $errors['emailError'] = 'Please enter email address';
      }
      elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'Please enter the correct email';
      }
      else{
        // Check if email exists
        if($this->userModel->findUserByEmail($data['email'])){
          $errors['emailError'] = 'Email is already taken';
        }
      }

      // Validate password on length and numeric value
      if(empty($data['password'])){
        $errors['passwordError'] = 'Please enter password';
      }
      elseif(strlen($data['password']) < 6){
        $errors['passwordError'] = 'Password must be at least 6 characters';
      }

      if(empty($_POST['role'])){
        $errors['roleError'] = 'Please select a role';
      }

      // Make sure that errors are empty
      if(empty($errors)){
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // Register user from model function
        if($this->userModel->register($data)){
          // Redirect to the login page
          http_response_code(201);
          echo json_encode($data);
        }
      }
      else{
        http_response_code(404);
        echo json_encode([
            'errors' => $errors
        ]);
      }

    }
    else{
      http_response_code(404);
      echo json_encode(['message'=> 'Failed']);
    }
  }

  public function register(){
    if ($this->session->get('user_id')) {
      header('location: ' . URLROOT);
    }

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
      $data = [
        'title' => 'Register',
        'username' => strtolower(trim($_POST['username'])),
        'email' => strtolower(trim($_POST['email'])),
        'password' => trim($_POST['password']),
        'confirmPassword' => trim($_POST['confirmPassword']),
        'usernameError' => '',
        'emailError' => '',
        'passwordError' => '',
        'confirmPasswordError' => ''
      ];
      
      $nameValidation = "/^[a-zA-Z0-9]*$/";

      // Validate username on letter/number
      if(empty($data['username'])){
        $data['usernameError'] = 'Please enter username';
      }
      elseif(!preg_match($nameValidation, $data['username'])){
        $data['usernameError'] = 'Name can only contain letters and numbers without space';
      }
      else{
        // Check if username exists
        if($this->userModel->findUserByUsername($data['username'])){
          $data['usernameError'] = 'Username is already taken';
        }
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
    if ($this->session->get('user_id')) {
      header('location: ' . URLROOT);
    }

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

  public function profile(){
    if (!$this->session->get('user_id')) {
      header('location: ' . URLROOT.'/users/login');
    }

    $data = [
        'title' => 'Profile',
        'page' => 'profile',
        'user' => $this->authUser,
      ];
   $this->view('frontend/users/profile', $data);
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
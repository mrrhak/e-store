<?php
class Dashboard extends Controller
{

  private ?User $user = null;

  public function __construct()
  {
    parent::__construct(); // For init session
    if ($userId = $this->session->get('user_id')) {
      $this->user = $this->model('User');
      $result =  $this->user->findUserById($userId);
      $this->user->username = $result->username;
      $this->user->email = $result->email;
      $this->user->role = $result->role;
      if($this->user->role != 'admin'){
        header('location: ' . URLROOT);
      }
    } else {
      header('location: ' . URLROOT.'/auth/login');
    }
  }

  public function index()
  {
    $data = [
      'title' => 'Admin Dashboard', // For make title
      'page' => 'dashboard', // For make menu active link
      'user' => $this->user ?? null,
    ];
    $this->view('backend/dashboard', $data);
  }
}

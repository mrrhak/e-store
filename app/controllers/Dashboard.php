<?php
class Dashboard extends Controller
{

  private User $user;

  public function __construct()
  {
    parent::__construct();
    // if ($userId = $this->session->get('user_id')) {
    //   $this->user = new User();
    //   $result =  $this->user->findUserById($userId);
    //   print_r($result->username);
    // } else {
    //   header('location: ' . URLROOT);
    // }
  }

  public function index()
  {
    $data = [
      'title' => 'Admin Dashboard',
    ];
    $this->view('backend/dashboard', $data);
  }
}

<?php
class Dashboard extends Controller
{

  private ?User $user = null;
  private $authUser;

  public function __construct()
  {
    parent::__construct(); // For init session
    if ($userId = $this->session->get('user_id')) {
      $this->user = $this->model('User');
      $result =  $this->user->findUserById($userId);
      $this->authUser = $result;
      if( $this->authUser == null){
        header('location: ' . URLROOT.'/auth/logout');
      }
      if($this->authUser->role != 'admin'){
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
      'user' => $this->authUser ?? null,
    ];
    $this->view('backend/dashboard', $data);
  }
}

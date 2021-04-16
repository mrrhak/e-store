<?php
  class Home extends Controller{
    private $user;
    public function __construct(){
      parent::__construct(); // For init session
      $this->user = $this->model('User');
      $this->bannerModel = $this->model("Banner");
      $this->categoryModel = $this->model("Category");
      if ($userId = $this->session->get('user_id')) {
        $result =  $this->user->findUserById($userId);
        $this->user->username = $result->username;
        $this->user->email = $result->email;
        $this->user->role = $result->role;
      }
    }

    public function index(){
      $users = $this->user->getUsers();
      $banners = $this->bannerModel->getAllBanners();
      $categories = $this->categoryModel->getAllCategory();
      $data = [
        'title' => 'Home',
        'page' => 'home', // For make menu active link
        'user' => $this->user->username != '' ? $this->user : null,
        'banners' => $banners,
        'categories' => $categories
      ];
      $this->view('frontend/index', $data);
    }
  }
?>
<?php
  class Home extends Controller{
    private $user;
    private $authUser;
    public function __construct(){
      parent::__construct(); // For init session
      $this->user = $this->model('User');
      $this->productMpdel = $this->model("Product");
      $this->bannerModel = $this->model("Banner");
      $this->categoryModel = $this->model("Category");
      if ($userId = $this->session->get('user_id')) {
        $result =  $this->user->findUserById($userId);
        $this->authUser = $result;
        if( $this->authUser == null){
          header('location: ' . URLROOT.'/auth/logout');
        }
      }
    }

    public function index(){
      //$users = $this->user->getUsers();
      $banners = $this->bannerModel->getAllBanners();
      $products = $this->productMpdel->getAllProduct();
      $categories = $this->categoryModel->getAllCategory();
      $data = [
        'title' => 'Home',
        'page' => 'home', // For make menu active link
        'user' => $this->authUser->username != '' ? $this->authUser : null,
        'banners' => $banners,
        'categories' => $categories , 
        "products" => $products
      ];
          
      $this->view('frontend/index', $data);
    }
  }
?>
<?php
class Dashboard extends Controller
{

  private ?User $user = null;
  private $authUser;
  private Product $product;
  private Category $category;
  private Order $order;

  public function __construct()
  {
    parent::__construct(); // For init session
    if ($userId = $this->session->get('user_id')) {
      $this->user = $this->model('User');
      $this->product = $this->model('Product');
      $this->category = $this->model('Category');
      $this->order = $this->model('Order');
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
    $countUser = $this->user->countUser();
    $countProduct = $this->product->countProduct();
    $countCategory = $this->category->countCategory();
    $countOrder = $this->order->countOrder();

    $data = [
      'title' => 'Admin Dashboard', // For make title
      'page' => 'dashboard', // For make menu active link
      'user' => $this->authUser ?? null,
      'productCount' => $countProduct,
      'categoryCount' => $countCategory,
      'orderCount' => $countOrder,
      'userCount' => $countUser,
    ];
    $this->view('backend/dashboard', $data);
  }
}

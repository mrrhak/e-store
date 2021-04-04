<?php
   class Products extends Controller{
       private ?User $user = null;

       public function __construct()
       {
           parent::__construct(); // For init session
           $this->productModel = $this->model("Product");
           $this->categoryModel= $this->model("Category");

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
       
       public  function index()
       {
        $products =  $this->productModel->getAllProduct();
        $categories = $this->categoryModel->getAllCategory() ;
         $data = [
             'title' => 'Admin Products', // For make title
             "page" => "products", // For make menu active link
             'user' => $this->user ?? null, // User auth for use admin dashboard
             "products" => $products,
             "categories" =>$categories,
         ];
        return $this->view('backend/products/index' , $data) ;
       }
   }
?>
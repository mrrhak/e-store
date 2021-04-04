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
            'title' => 'Products/Create', // For make title
            "page" => "products/create", // For make menu active link
            'user' => $this->user ?? null, // User auth for use admin dashboard
            "products" => $products,
            "categories" =>$categories,
        ];
        return $this->view('backend/products/index' , $data) ;
       }
       
       //create products
        public function create()
        {
            $categories = $this->categoryModel->getAllCategory() ;
            $products =  $this->productModel->getAllProduct();
           
         $dataPage = [
            'title' => 'Admin Products', // For make title
            "page" => "products", // For make menu active link
            'user' => $this->user ?? null, // User auth for use admin dashboard
            "products" => $products,
            "categories" =>$categories,
        ];
       
       $dataProducts = [
            "name"=> "" ,
            'image' => "" ,
            "price" => "" ,
            "description" => "" ,
           "status" => "" ,
           "category_id" => "" ,
            "created_at" => "" ,
            "user_id" => "",
            //Error Message
           "nameError" => "" ,
            'imageError' => "" ,
            "priceError" => "" ,
            "descriptionError" => "" ,
           "statusError" => "" ,
           "categoryIdError" => "" ,
            "createdAtError" => "" ,
            "userIdError" => "",
           
       ] ;
       
    //   header('Content-type: application/json');
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING)  ;
            
       $dataProducts = [
        "name"=> trim($_POST["name"]) ,
        'image' => trim($_POST["image"]) ,
        "price" => trim($_POST["price"]) ,
        "description" => trim($_POST["description"]) ,
       "status" => "1" ,
       "category_id" => trim($_POST["category_id"]) ,
       "user_id" => $this->session->get('user_id'),
        //Error Message
       "nameError" => "" ,
        'imageError' => "" ,
        "priceError" => "" ,
        "descriptionError" => "" ,
       "statusError" => "" ,
       "categoryIdError" => "" ,
        "createdAtError" => "" ,
        "userIdError" => "",
          ] ;
   
       }
       
       var_dump($dataProducts) ;
   
        $data = [
            "page" => "products/create", // For make menu active link,
            'title' => 'Products/Create', // For make title,
            'user' => $this->user ?? null, // User auth for use admin dashboard,
            "products" => $dataProducts,
            "categories" =>$categories,
        ];
            return  $this->view("backend/products/create" , $data);
        }
   }
?>
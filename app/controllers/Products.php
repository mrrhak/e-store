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
       
       //product page index
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

       // create function product detail 
       public function productDetail($id){
            $product = $this->productModel->findProductById($id);
            http_response_code(200);
            echo json_encode($product);
       }
       
       //update products 
       
       
        //create function create products
        public function create(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
               
                $errors = [] ;
                $image = '' ;
                
                if(isset($_FILES["image"])){
                    $imageRespone = $this->productModel->upload_image('image'); 
                    if( $imageRespone["success"] == true) {
                        $image = $imageRespone["name"] ;
                    }else {
                        $errors["imageError"] = $imageRespone["errors"];    
                    }
                 }else{
                    $errors["imageError"] = "Please check Image" ;
                 }
         
                //data products
                $data = [
                    'name' => $_POST['name'] ,
                    'price' => $_POST['price'] ,
                    'image' => $image ,
                    'qty' => $_POST['qty'] ,
                    'category_id' => $_POST['category_id'],
                    'description' => $_POST['description'] ,
                    'status' => "1" ,
                    'user_id' => $this->session->get('user_id') ,
                ];
                
             
                // validation 
                if(empty($data['user_id'])){
                    $errors["userError"] = "user error" ;
                }
                if(empty($data['name'])){
                     $errors["nameError"] = "please enter product name" ;
                }
                if(empty($data["price"])){
                    $errors["priceError"] = "please enter price of product" ;
                }
                if(empty($data["qty"])){
                    $errors["qtyError"] = "please enter qty of product" ;
                }
                if(empty($data["category_id"])){
                    $errors["priceError"] = "please select category of product" ;
                }
                
                if(empty($errors)){
                    if($this->productModel->create($data)) {
                        echo json_encode($data);
                    }
                }else{
                  
                    http_response_code(422);
                    echo json_encode([
                        'errors' => $errors
                    ]);
                }
                
            }else{
                
                echo json_encode(['message'=> 'Failed']);
                http_response_code(422);
            }
        }
        
        //create function update product
        public function updateProduct($id){

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
                   
                    $errors = [] ;
                    $image = '' ;
                    //print_r($_FILES["image"]) ;
                 if($_POST["title_image"]){
                       $image = $_POST["title_image"] ;
                 } else if(isset($_FILES["image"])){
                        $imageRespone = $this->productModel->upload_image('image'); 
                        if( $imageRespone["success"] == true) {
                            $image = $imageRespone["name"] ;
                        }else {
                            $errors["imageError"] = $imageRespone["errors"];    
                        }
                     }else{
                        $errors["imageError"] = "Please check Image" ;
                     }
             
                    //data products
                    $data = [
                        'name' => $_POST['name'] ,
                        'price' => $_POST['price'] ,
                        'image' => $image ,
                        'qty' => $_POST['qty'] ,
                        'category_id' => $_POST['category_id'],
                        'description' => $_POST['description'] ,
                        'user_id' => $this->session->get('user_id') ,
                    ];
                    
                 
                    // validation 
                    if(empty($data['user_id'])){
                        $errors["userError"] = "user error" ;
                    }
                    if(empty($data['name'])){
                         $errors["nameError"] = "please enter product name" ;
                    }
                    if(empty($data["price"])){
                        $errors["priceError"] = "please enter price of product" ;
                    }
                    if(empty($data["qty"])){
                        $errors["qtyError"] = "please enter qty of product" ;
                    }
                    if(empty($data["category_id"])){
                        $errors["priceError"] = "please select category of product" ;
                    }
                    
                    if(empty($errors)){
                        if($this->productModel->updateProductById($data,$id)) {
                            echo json_encode($data);
                            http_response_code(200);
                        }
                    }else{
                        http_response_code(422);
                        echo json_encode([
                            'errors' => $errors
                        ]);
                    }
                    
                }else{
                    echo json_encode(['message'=> 'Failed']);
                    http_response_code(422);
                }
            }
            
            public function deleteProduct($id){
                if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                    $errors = [];
              
                    if(!isset($id)){
                      $errors['deleteError'] = 'Please provide spacific product to delete';
                    }
                    // Make sure that errors are empty
                    if(empty($errors)){
                      if($this->productModel->deleteProductById($id)){
                        http_response_code(201);
                        echo json_encode([
                          'message' => 'Product deleted successfully',
                        ]);
                      }
                      else{
                        http_response_code(422);
                        $errors['deleteError'] = 'Failed to delete  product';
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
            }
    


}

?>
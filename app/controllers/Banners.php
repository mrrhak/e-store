<?php
   class Banners extends Controller{
       private ?User $user = null;

       public function __construct()
       {
           parent::__construct(); // For init session
           $this->bannerModel = $this->model("Banner");
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
        $banners =  $this->bannerModel->getAllBanners();
        $categories = $this->categoryModel->getAllCategory() ;
        $data = [
            'title' => 'Banners/Create', // For make title
            "page" => "banners", // For make menu active link
            'user' => $this->user ?? null, // User auth for use admin dashboard
            "banners" => $banners,
            "categories" =>$categories,
        ];
        return $this->view('backend/banners/index' , $data) ;
       }

       // create function product detail 
       public function bannerDetail($id){
            $banner = $this->bannerModel->findBannerById($id);
            http_response_code(200);
            echo json_encode($banner);
       }
       
       //update products 
       
       
        //create function create products
        public function create(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
               
                $errors = [] ;
                $image = '' ;
                
                if(isset($_FILES["image"])){
                    $imageRespone = $this->bannerModel->upload_image('image'); 
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
                    'title' => $_POST['title'] ,
                    'image' => $image ,
                    'category_id' => $_POST['category_id'],
                    'user_id' => $this->session->get('user_id') ,
                ];
                
             
                // validation 
                if(empty($data['user_id'])){
                    $errors["userError"] = "user error" ;
                }
                if(empty($data['title'])){
                     $errors["titleError"] = "please enter banner title" ;
                }
                if(empty($data["category_id"])){
                    $errors["titleError"] = "please select category of banner" ;
                }
                
                if(empty($errors)){
                    if($this->bannerModel->create($data)) {
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
        public function updateBanner($id){

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
                   
                    $errors = [] ;
                    $image = '' ;
                    //print_r($_FILES["image"]) ;
                 if($_POST["title_image"]){
                       $image = $_POST["title_image"] ;
                 } else if(isset($_FILES["image"])){
                        $imageRespone = $this->bannerModel->upload_image('image'); 
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
                        'title' => $_POST['title'] ,
                        'image' => $image ,
                        'category_id' => $_POST['category_id'],
                        'user_id' => $this->session->get('user_id') ,
                    ];
                    
                 
                    // validation 
                    if(empty($data['user_id'])){
                        $errors["userError"] = "user error" ;
                    }
                    if(empty($data['title'])){
                         $errors["titleError"] = "please enter banner  title" ;
                    }
                    if(empty($data["category_id"])){
                        $errors["categoryError"] = "please select category of banner" ;
                    }
                    
                    if(empty($errors)){
                        if($this->bannerModel->updateBannerById($data,$id)) {
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
            
            public function deleteBanner($id){
                if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                    $errors = [];
              
                    if(!isset($id)){
                      $errors['deleteError'] = 'Please provide spacific banner to delete';
                    }
                    // Make sure that errors are empty
                    if(empty($errors)){
                      if($this->bannerModel->deleteBannerById($id)){
                        http_response_code(201);
                        echo json_encode([
                          'message' => 'Banner deleted successfully',
                        ]);
                      }
                      else{
                        http_response_code(422);
                        $errors['deleteError'] = 'Failed to delete  banner';
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
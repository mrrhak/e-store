<?php
   class Categories extends Controller {
       public  function __construct(){
        parent::__construct(); // For init session
        
        $this->db = new Database() ;
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
       
     public  function index() {
             
      $categories = $this->categoryModel->getAllCategory() ;
      $data = [
          'title' => 'Category', // For make title
          "page" => "category", // For make menu active link
          'user' => $this->user ?? null, // User auth for use admin dashboard
          "categories" =>$categories,
      ];
      return $this->view('backend/categories/index' , $data) ;
     }
     
     // create function category detail 
     public function categoryDetail($cate_id){
        $category = $this->categoryModel->findCategoryById($cate_id);
        http_response_code(200);
        echo json_encode($category);
   }
     
     //create function create category
     public function create(){
           
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
           
            $errors = [] ;
            //data category
            $data = [
                'category_name' => $_POST['category_name'] ,
                'status' => "1" ,
                'user_id' => $this->session->get('user_id') ,
            ];
            
         
            // validation 
            if(empty($data['user_id'])){
                $errors["userError"] = "user error" ;
            }
            if(empty($data['category_name'])){
                 $errors["categoryNameError"] = "please enter category name" ;
            }
            if(empty($errors)){
                if($this->categoryModel->create($data)) {
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
    
    //create function update  category
    public function updateCategory($cate_id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ;
                $errors = [] ;
                //data category
                $data = [
                    'category_name' => $_POST['edit_category_name'] ,
                    'user_id' => $this->session->get('user_id') ,
                ];
                
             
                // validation 
                if(empty($data['user_id'])){
                    $errors["userError"] = "user error" ;
                }
                if(empty($data['category_name'])){
                     $errors["categoryNameError"] = "please enter category name" ;
                }
                if(empty($errors)){
                    if($this->categoryModel->updateCategoryById($data,$cate_id)) {
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
        
        //create function deleted category
    public function deleteCategory($cate_id){
            if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                $errors = [];
          
                if(!isset($cate_id)){
                  $errors['deleteError'] = 'Please provide spacific category to delete';
                }
                // Make sure that errors are empty
                if(empty($errors)){
                  if($this->categoryModel->deleteCategoryById($cate_id)){
                    http_response_code(201);
                    echo json_encode([
                      'message' => 'Category deleted successfully',
                    ]);
                  }
                  else{
                        http_response_code(422);
                        $errors['deleteError'] = 'Failed to delete category';
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
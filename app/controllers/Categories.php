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
   }
?>
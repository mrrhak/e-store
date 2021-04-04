<?php
   class Manageusers extends Controller{
       private ?User $user = null;

       public function __construct()
       {
           parent::__construct(); // For init session
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
        $users =  $this->user->getUsers();
         $data = [
             'title' => 'Admin Users', // For make title
             "page" => "ManageUsers", // For make menu active link
             'user' => $this->user ?? null, // User auth for use admin dashboard
             "users" => $users,
         ];
        return $this->view('backend/users/index' , $data) ;
       }
   }
?>
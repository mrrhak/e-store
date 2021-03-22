<?php
  class Dashboard extends Controller{        
    public function index(){      
      $data = [
        'title' => 'Admin Dashboard',
      ];
      $this->view('backend/dashboard',$data);
    }
  }
?>
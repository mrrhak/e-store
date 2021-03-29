<?php
 class Category {
      function __construct()
      {
        $this->db = new Database() ;
      }
      
    function getAllCategory(){
         $this->db->query("SELECT *FROM categories ORDER BY created_at ASC") ;
          $resault  =  $this->db->resultSet();
          return $resault;
         
    }
 }
?>
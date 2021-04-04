<?php
   class Product {
       
       public function __construct()
       {
            $this->db = new Database() ;
       }
    //   this function return all product list
    public function getAllProduct(){
         $this->db->query('SELECT * FROM products ORDER BY created_at ASC');
         $results = $this->db->resultSet() ;
         return $results ;
    }
    // this function create products
//    public function create(){
//        $this->db->query("")
//    }
    
    
       
   }
?>
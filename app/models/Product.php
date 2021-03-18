
<?php
   class Product {
       
       public function __construct()
       {
            $this->db = new Database() ;
       }
    
    //   this function return all product list
    public function getAllProduct(){
         $this->db->query('SELECT * FROM products ORDER BY create_at ASC');
         $results = $this->db->resaultSet() ;
         return $results ;
    }
    
       
   }
?>
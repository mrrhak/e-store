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
   //  this function create products
   public function create($data)
   {
      $this->db->query("INSERT INTO products ( name,price , image, price , description , category_id , status , user_id) VALUES (:name, :image, :price, :description ,:category_id , :status , :user_id )");
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':image', $data['image']) ;
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':description' , $data['description']) ;
      $this->db->bind(':category_id' ,  $data["category_id"]) ;
      $this->db->bind(':status' , $data['status']) ;
      $this->db->bind(':user_id' , $data['user_id']) ;
  
      // Execute function
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
    
       
   }
?>
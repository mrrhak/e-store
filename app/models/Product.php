<?php
   class Product {
       
       public function __construct()
       {
            $this->db = new Database() ;
       }
       
    //   this function return all product list
    public function getAllProduct(){
         $this->db->query('SELECT * FROM products INNER JOIN categories ON categories.cate_id = products.category_id ');
         $results = $this->db->resultSet() ;
         return $results ;
    }
    
   //  this function create products
   public function create($data)
   {
      $this->db->query("INSERT INTO products ( name, image, price , qty , description , category_id , status , user_id) VALUES (:name, :image, :price, :qty , :description ,:category_id , :status , :user_id )");
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':image', $data['image']) ;
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':description' , $data['description']) ;
      $this->db->bind(':category_id' ,  $data["category_id"]) ;
      $this->db->bind(':status' , $data['status']) ;
      $this->db->bind(':user_id' , $data['user_id']) ;

      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
    
    //update product by id 
     public function updateProductById($data,$id){
      $now = new DateTime();
       $nowStr = date_format($now,"Y-m-d H:i:s");
        $this->db->query('UPDATE products SET name =:name , price =:price , image= :image , qty =:qty ,  description =:description , category_id=:category_id , user_id=:user_id, created_at =:created_at WHERE id=:id') ;
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']) ;
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':description' , $data['description']) ;
        $this->db->bind(':category_id' ,  $data["category_id"]) ;
        $this->db->bind(':user_id' , $data['user_id']) ;
        $this->db->bind(':id' ,  $id) ;
        $this->db->bind(':created_at' , $nowStr);
        if ($this->db->execute()) {
          return true;
        } else {
          return false;
        }
     }
     
     //create function delete product
     public function deleteProductById($id){
        $this->db->query('DELETE FROM products  WHERE id=:id') ;
        $this->db->bind(':id' , $id) ;
        $this->db->execute();
       return $this->db->rowCount();
     }
    
    //find pdouct by id
    public function findProductById($id)
    {
      $this->db->query('SELECT * FROM products WHERE id = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }
      
    
    //validate image
    public function  upload_image($file){
  
      if(isset($_FILES[$file])) {
        $image_status = "" ;
        $errors     = array();
        $maxsize    = 41943040;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/gif',
            'image/png'
        );
    
        if(($_FILES[$file]['size'] >= $maxsize) || ($_FILES[$file]["size"] == 0)) {
            $errors = 'File too large. File must be less than 20 megabytes.';
        }
    
        if(!in_array($_FILES[$file]['type'], $acceptable) && (!empty($_FILES[$file]["type"]))) {
        $errors = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
        }
        
        if(empty($errors)) {
            move_uploaded_file($_FILES[$file]['tmp_name'],  $_SERVER['DOCUMENT_ROOT']."/e-store/public/img/".$_FILES[$file]['name']);
              $temp = $_FILES[$file]['name'] ;
            return [
                'name' => $temp ,
                'success' => true
              ];
          } else {
            return [
              'errors' => $errors,
              'success' =>  false
            ];
          }
        }
    
    }
    


  
   }
?>
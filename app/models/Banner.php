<?php
   class Banner {
       
       public function __construct()
       {
            $this->db = new Database() ;
       }
       
    //   this function return all product list
    public function getAllBanners(){
         $this->db->query('SELECT * FROM banners INNER JOIN categories ON categories.cate_id = banners.category_id ');
         $results = $this->db->resultSet() ;
         return $results ;
    }
    
   //  this function create products
   public function create($data)
   {
      $this->db->query("INSERT INTO banners ( title, image, category_id , user_id) VALUES (:title, :image, :category_id , :user_id )");
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':image', $data['image']) ;
      $this->db->bind(':category_id' ,  $data["category_id"]) ;
      $this->db->bind(':user_id' , $data['user_id']) ;
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
    
    //update product by id 
     public function updateBannerById($data,$id){
      $now = new DateTime();
       $nowStr = date_format($now,"Y-m-d H:i:s");
        $this->db->query('UPDATE banners SET  title =:title , image= :image , category_id=:category_id , user_id=:user_id, created_at =:created_at WHERE banner_id=:banner_id') ;
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':image', $data['image']) ;
        $this->db->bind(':category_id' ,  $data["category_id"]) ;
        $this->db->bind(':user_id' , $data['user_id']) ;
        $this->db->bind(':banner_id' ,  $id) ;
        $this->db->bind(':created_at' , $nowStr);
        if ($this->db->execute()) {
          return true;
        } else {
          return false;
        }
     }
     
     //create function delete product
     public function deleteBannerById($id){
        // FineOne to remove image
        $deleteBanner = $this->findBannerById($id);
        if($deleteBanner != null){
            //Remove Image
            $imagePath = "../public/uploads/".$deleteBanner->image;
            if(file_exists($imagePath)){
              unlink($imagePath);
            }

            $this->db->query('DELETE FROM banners  WHERE  banner_id = :banner_id') ;
            $this->db->bind(':banner_id', $deleteBanner->banner_id) ;
            $this->db->execute();
            return $this->db->rowCount();
        }
     }
    
    //find pdouct by id
    public function findBannerById($id)
    {
      $this->db->query('SELECT * FROM banners WHERE banner_id = :banner_id');
      $this->db->bind(':banner_id', $id);
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
            $errors = 'Please select file , File must be less than 20 megabytes.';
        }
    
        if(!in_array($_FILES[$file]['type'], $acceptable) && (!empty($_FILES[$file]["type"]))) {
        $errors = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
        }
        
        if(empty($errors)) {
            $filename = $_FILES[$file]['name'];
            if(move_uploaded_file($_FILES[$file]['tmp_name'], "../public/uploads/".$filename)){
              return [
                'name' => $filename ,
                'success' => true
              ];
            }
            else {
              return [
                'errors' => "Upload banner imgae failed.",
                'success' =>  false
              ];
            } 
            return [
                'name' => $filename ,
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
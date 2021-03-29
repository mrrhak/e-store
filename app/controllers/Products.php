<?php
   class Products extends Controller{
       public function __construct()
       {
           $this->productModel = $this->model("Product");
           $this->categoryModel= $this->model("Category") ;
       }
       
       public  function index()
       {
        $products =  $this->productModel->getAllProduct();
        $categories = $this->categoryModel->getAllCategory() ;
         $data = [
             "products" => $products,
             "categories" =>$categories,
         ];
        return $this->view('backend/products/index' , $data) ;
       }
   }
?>
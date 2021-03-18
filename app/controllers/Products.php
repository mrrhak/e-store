<?php
   class Products extends Controller{
       public function __construct()
       {
           $this->productModel = $this->model("Product");
       }
       
       public  function index()
       {
        return $this->view('backend/products/index') ;
       }
   }
?>
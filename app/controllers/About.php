<?php
class About extends Controller{
  public function index(){
    return $this->view('frontend/about');
  }

  public function new($id, $name, $other){
    $data = [
      "id" => $id,
      "name" => $name,
      "other" => $other
    ];
    return $this->view('frontend/new', $data);
  }
}
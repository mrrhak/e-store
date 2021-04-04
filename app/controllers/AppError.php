<?php
class Apperror extends Controller{
  public function index(){
    return $this->view('404');
  }
}
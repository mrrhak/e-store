<?php
class AppError extends Controller{
  public function index(){
    return $this->view('404');
  }
}
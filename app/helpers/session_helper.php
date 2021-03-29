<?php
  session_start();

  function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    }
    else{
      return false;
    }
  }
  
function layout ($views){
  return APPROOT."/views/layouts/$views.php";
}
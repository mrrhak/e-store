<?php
class Session
{
  public function __construct()
  {
    session_start();
  }

  public function set(string $key, string $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get(string $key)
  {
    if(isset($_SESSION[$key])){
      return $_SESSION[$key];
    }
    return false;
    
  }

  public function remove(string $key)
  {
    if(isset($_SESSION[$key])){
       unset($_SESSION[$key]);
    }
    return false;
  }
}

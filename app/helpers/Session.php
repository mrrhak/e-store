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
    return $_SESSION[$key];
  }
}

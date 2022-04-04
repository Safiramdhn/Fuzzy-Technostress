<?php

class Session{
  // initial
  public static function init(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
  }

  // set session
  public static function set($key, $val){
    $_SESSION[$key] = $val;
  }

  public static function get($key){
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    }else{
      return false;
    }
  }

  public static function destroy(){
    session_destroy();
    session_unset();
    session_write_close();
    header('Location:index.php');
  }

  // Check Login Method
  public static function LoginAdmin(){
    if (self::get("loginAdmin") == TRUE) {
      header('Location:dashboardAdmin.php');
    }
    if (self::get("login") == TRUE) {
      header('Location:dashboard.php');
    }
  }
  // Check Login Method
  public static function Login(){
  }
}

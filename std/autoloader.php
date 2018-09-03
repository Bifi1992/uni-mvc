<?php
namespace std;

class Autoloader {
  private function __construct() {
    spl_autoload_register(array($this, 'load_class'));
  }

  public static function register() {
    new Autoloader();
  }

  public function load_class($class_name) : void{
    try {
      $file = LOCALDIR . strtolower(str_replace('\\', '/', $class_name)) . '.php';
      require_once( $file );
      if (!file_exists($file)) {
        header('HTTP/1.0 404 File not found');
        include(LOCALDIR . '404.htm');
        exit;
      }
    } catch (\EXCEPTION $e) {
      var_dump($e);
    }
  }
}

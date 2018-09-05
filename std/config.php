<?php
include_once('./std/autoloader.php');

\std\Autoloader::register();
define('WEBDIR', '/stief.de/');
define('LOCALDIR', $_SERVER['DOCUMENT_ROOT'].'/stief.de/');

$view = new \std\View();
$con = null;

class Config {


  static public function getView() : \std\View {
    global $view;
    return $view;
  }

  static public function getConnection() : ?\PDO {
    global $con;
    return $con;
  }

  static public function setConnection( \PDO $con1 ) : void {
    global $con;
    $con = $con1;
  }
}

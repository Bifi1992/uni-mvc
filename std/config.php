<?php
  include_once('./std/autoloader.php');

  \std\Autoloader::register();
  define('WEBDIR', '/stief.de/');
  define('LOCALDIR', $_SERVER['DOCUMENT_ROOT'].'/stief.de/');

  $view = new \std\View();
  global $view;

  class Config {
    static public function getView() : \std\View {
      return $GLOBALS['view'];
    }
  }

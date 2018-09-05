<?php
namespace modules\products;

class Model extends \std\DbConnect {
  public function __construct() {
    parent::__construct();
  }

  public function getProductByName( string $name ) : \stdClass {
    $sql = "select * from product where name = :NAME";
    \Config::getConnection()->prepare($sql);
    $result = \Config::getConnection()->execute(array(':NAME' => $name));
    return $result->fetchAll(\PDO::FETCH_OBJ);
  }
}

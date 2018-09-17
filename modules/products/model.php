<?php
namespace modules\products;

class Model extends \std\DbConnect {
  public function __construct() {
    parent::__construct();
  }

  public function getProductByName( string $name ) : array {
    $sql = "select * from unimvc.product where name = :NAME";
    $prepare = \Config::getConnection()->prepare($sql);
    $result = $prepare->execute(array(':NAME' => $name));
    return $prepare->fetchAll(\PDO::FETCH_OBJ);
  }
}

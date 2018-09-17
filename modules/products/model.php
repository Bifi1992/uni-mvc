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

  public function getGroupByName( string $name ) : array {
    $sql = "select * from unimvc.product_category where name = :NAME";
    $prepare = \Config::getConnection()->prepare($sql);
    $result = $prepare->execute(array(':NAME' => $name));
    return $prepare->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getProductsByGroupId( int $id, int $limit  = 0) : array {
    $sql = "select * from unimvc.product where product_category_id = :ID " . ($limit > 0 ? "limit " . $limit : "");
    $prepare = \Config::getConnection()->prepare($sql);
    $result = $prepare->execute(array(':ID' => $id));
    return $prepare->fetchAll(\PDO::FETCH_OBJ);
  }
  public function getAllProductCategories() : array {
    $sql = "select * from unimvc.product_category";
    $prepare = \Config::getConnection()->prepare($sql);
    $result = $prepare->execute(array());
    return $prepare->fetchAll(\PDO::FETCH_OBJ);
  }
}

<?php
namespace std;

class DbConnect {

  public function __construct() {
    if (\Config::getConnection() == null) {
      try {
        $con = new \PDO(
          'mysql:host=localhost;port=8889;dbname=unimvc;charset=UTF8', 
          'root', 
          'root', 
          array( 
            \PDO::ATTR_PERSISTENT => true, 
            \PDO::MYSQL_ATTR_FOUND_ROWS => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => true
          )
        );
        \Config::setConnection($con);
      } catch (\PDOException $e) {
        echo $e->getMessage() . "<br/>";
        echo $e->getCode() . "<br/>";
      }
    }
  }
}

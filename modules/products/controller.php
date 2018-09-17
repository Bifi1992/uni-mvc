<?php
namespace modules\products;

class Controller extends \std\Controller {
  private $model;

  public function __construct() {
    parent::__construct();
    $this->model = new Model();
  }

  public function render() :string {
    switch ($this->viewname) {
    case 'product':
      var_dump($this->model->getProductByName('Pizza'));
      break;
    case 'group':
      break;
    default:
      echo "viewname not handled";
    }
    \Config::getView()->setTemplate($this->viewname, __DIR__ . '/templates/');
    return \Config::getView()->loadTemplate();
  }
}

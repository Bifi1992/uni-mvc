<?php
namespace modules\products;

class Controller extends \std\Controller {
  private $model;

  public function __construct() {
    parent::__construct();
    $this->model = new Model();
  }

  public function render() : string {
    switch ($this->viewname) {
    case 'product':
      $product = $this->model->getProductByName(urldecode($this->route[2]))[0];
      \Config::getView()->name = $product->name;
      \Config::getView()->description = $product->description;
      \Config::getView()->price = $product->price;
      break;
    case 'group':
      $group = $this->model->getGroupByName(urldecode($this->route[2]))[0];
      \Config::getView()->name = $group->name;
      $products = $this->model->getProductsByGroupId($group->id);
      \Config::getView()->products = $this->getProducts($this->model->getProductsByGroupId($group->id));
      break;
    default:
      $categories = $this->model->getAllProductCategories();
      $catStr = "";
      foreach ((array) $categories as $category) {
        $str = $this->getProducts($this->model->getProductsByGroupId($category->id, 1));
        \Config::getView()->products = $str;
        \Config::getView()->name = $category->name;
        \Config::getView()->setTemplate('group', __DIR__ . '/templates/');
        $catStr .= \Config::getView()->loadTemplate();
      }
      \Config::getView()->groups = $catStr;
    }
    \Config::getView()->setTemplate($this->viewname, __DIR__ . '/templates/');
    return \Config::getView()->loadTemplate();
  }

  private function getProducts(array $products) : string {
    $str = "";
    foreach ((array) $products as $product) {
      \Config::getView()->name = $product->name;
      \Config::getView()->description = $product->description;
      \Config::getView()->price = $product->price;       
      \Config::getView()->setTemplate('product', __DIR__ . '/templates/');
      $str.= \Config::getView()->loadTemplate();
    }
    return $str;
  }
}

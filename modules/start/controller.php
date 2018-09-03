<?php
namespace modules\start;

class Controller {
  private $view;
  public function render() :string {
    $this->view = new \std\View();
    $this->view->setTemplate('default', __DIR__ . '/templates/');
    return $this->view->loadTemplate();
  }
}

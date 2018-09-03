<?php
namespace std;
class Controller {
  private $module;
  private $modulename;
  private $viewname;
  private $view;

  public function __construct() {
    $route = explode("/", preg_replace('~^' . WEBDIR . '~', '', $_SERVER['REQUEST_URI']));
    $this->modulename = $route[0] ? $route[0] : 'start';
    $this->viewname = basename((isset($route[1]) ? $route[1] : 'default'), '.htm');
    $this->view = new \std\View();
  }
  public function render() : string {
    $modulecontroller = '\\modules\\' . $this->modulename . '\\Controller';
    $this->module = new $modulecontroller();
    $this->view->content = $this->module->render();
    $this->view->setTemplate('default', __DIR__ . '/templates/');
    return $this->view->loadTemplate();
  }
}


<?php
namespace std;

class Controller {
  private $module;
  private $modulename;
  protected $viewname;

  public function __construct() {
    $route = explode("/", preg_replace('~^' . WEBDIR . '~', '', $_SERVER['REQUEST_URI']));
    $this->modulename = $route[0] ? $route[0] : 'start';
    $this->viewname = basename((isset($route[1]) ? $route[1] : 'default'), '.htm');
  }
  public function render() : string {
    $modulecontroller = '\\modules\\' . $this->modulename . '\\Controller';
    $this->module = new $modulecontroller();
    \Config::getView()->content = $this->module->render();
    \Config::getView()->setTemplate('default', __DIR__ . '/templates/');
    return \Config::getView()->loadTemplate();
  }
}


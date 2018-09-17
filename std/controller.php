<?php
namespace std;

class Controller {
  private $module;
  private $modulename;
  protected $viewname;
  protected $route;

  public function __construct() {
    $this->route = explode("/", preg_replace('~^' . WEBDIR . '~', '', $_SERVER['REQUEST_URI']));
    $this->modulename = $this->route[0] ? $this->route[0] : 'start';
    $this->viewname = basename((isset($this->route[1]) ? $this->route[1] : 'default'), '.htm');
  }
  public function render() : string {
    $modulecontroller = '\\modules\\' . $this->modulename . '\\Controller';
    $this->module = new $modulecontroller();
    \Config::getView()->content = $this->module->render();
    \Config::getView()->setTemplate('default', __DIR__ . '/templates/');
    return \Config::getView()->loadTemplate();
  }
}


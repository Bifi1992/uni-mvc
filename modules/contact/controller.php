<?php
namespace modules\contact;

class Controller {
  public function render() :string {
    \Config::getView()->setTemplate('default', __DIR__ . '/templates/');
    return \Config::getView()->loadTemplate();
  }
}

<?php
namespace std;
class View {
  public $template = 'default';
  private $path = 'templates';

  public function __construct() {
    //echo "view";
  }

  public function setTemplate(string $template = null, string $path = null) : void {
    $this->path = $path;
    $this->template = $template;

    if (!file_exists($path . $template . '.php')) {
      header('HTTP/1.0 404 File not found');
      include(LOCALDIR . '404.htm');
      exit;
    }
  }

  public function loadTemplate() {
    ob_start();
    require($this->path . $this->template . '.php');
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

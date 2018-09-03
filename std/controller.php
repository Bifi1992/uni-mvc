<?php
namespace std;
class Controller {
  private $modul;
  private $modulname;
  private $viewname;

  public function __construct() {
    $route = explode("/", preg_replace('~^' . WEBDIR . '~', '', $_SERVER['REQUEST_URI']);
    $this->modulname = $route[0];
    $this->viewname = basename($route[1], '.htm');
  }
  public function render() : string {
    return "
                T\ T\
                | \| \
                |  |  :
           _____I__I  |
         .'            '.
       .'                '
       |   ..             '
       |  /__.            |
       :.' -'             |
      /__.                |
     /__, \               |
        |__\        _|    |
        :  '\     .'|     |
        |___|_,,,/  |     |    _..--.
     ,--_-   |     /'      \../ /  /\\
    ,'|_ I---|    7    ,,,_/ / ,  / _\\
  ,-- 7 \|  / ___..,,/   /  ,  ,_/   '-----.
 /   ,   \  |/  ,____,,,__,,__/            '\
,   ,     \__,,/                             |
| '.       _..---.._                         !.
! |      .' z_M__s. '.                        |
.:'      | (-_ _--')  :          L            !
.'.       '.  Y    _.'             \,         :
 .          '-----'                 !          .
  .           /  \                   .          .
";
  }
}


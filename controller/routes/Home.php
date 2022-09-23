<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\Wrappers\RouteController;
use Cms\Routes\Request;

require_once "config.php";
require_once "wrappers/RouteController.php";

class Home extends RouteController {
    
    protected function get(){
        view("index");
    }
}

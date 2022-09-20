<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\routeController;
use Cms\Routes\Request;

require_once "config.php";
require_once "routeController.php";

class Home extends routeController {
    
    protected static function get(){
        view("index");
    }
}

<?php
namespace Cms\Controller\Routes\Admin;
use Cms\Controller\Routes\Wrappers\ProtectedRouteController;
use Cms\Routes\Request;
use Cms\Model\DataProviders\SQLDataProvider;

require_once "config.php";
require_once "controller/routes/wrappers/ProtectedRouteController.php";
require_once "model/DataProviders/SQLDataProvider.php";

class AdminDashboard extends ProtectedRouteController {
    
    protected function get(){
        view("admin-manage");
    }


    protected function post(){
        $sql = SQLDataProvider::getInstance();

    }
}

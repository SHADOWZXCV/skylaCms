<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\RouteController;
use Cms\Routes\Request;
use Cms\Model\DataProviders\SQLDataProvider;

require_once "config.php";
require_once "routeController.php";
require_once "model/DataProviders/SQLDataProvider.php";

class Admin extends RouteController {
    
    protected function get(){
        view("admin");
    }

    private function dataValidator(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === "" || $password  === ""){
            return 1;
        }

        return 0;
    }

    protected function post(){
        $sql = SQLDataProvider::getInstance();
        $st = "SELECT id, username, password FROM admins WHERE username = :username AND password = :password;";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $isDataNotValid = $this->dataValidator();
        if($isDataNotValid){
            view("admin-signup", ['signup-errors' => $isDataNotValid]);
            die();
        }

        $res = $sql->query(
        $st, [
        ':username' => $username,
        ':password' => $password,
        ], 'Admin');

        if(!$res['status']){
            view("admin", ['signup-errors' => $res['errors'][1]]);
            die();
        } else if(!$res['data']){
            view("admin", ['signup-errors' => -1]);
            die();
        }

        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
        die();
    }
}

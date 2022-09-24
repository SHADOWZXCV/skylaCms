<?php
namespace Cms\Controller\Routes\Admin;
use Cms\Controller\Routes\Wrappers\RouteController;
use Cms\Routes\Request;
use Cms\Model\Admin as AdminModel;

session_start();
require_once "config.php";
require_once "controller/routes/wrappers/RouteController.php";
require_once "model/Admin.php";

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
        $username = $_POST['username'];
        $password = $_POST['password'];

        $isDataNotValid = $this->dataValidator();
        if($isDataNotValid){
            view("admin-signup", ['signup-errors' => $isDataNotValid]);
            die();
        }

        $res = AdminModel::getModel([
            ':username' => $username,
            ':password' => $password,
        ]);

        if(!$res['status']){
            view("admin", ['signup-errors' => $res['errors'][1]]);
            die();
        } else if(!$res['data']){
            view("admin", ['signup-errors' => -1]);
            die();
        }

        $_SESSION['userId'] = $res['data'][0]->id;
        $_SESSION['signin-successful'] = 1;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/manage');
        die();
    }
}

<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\Wrappers\RouteController;
use Cms\Routes\Request;
use Cms\Model\DataProviders\SQLDataProvider;

require_once "config.php";
require_once "wrappers/RouteController.php";
require_once "model/DataProviders/SQLDataProvider.php";

class AdminSignup extends RouteController {
    
    protected function get(){
        view("admin-signup");
    }

    /**
     * code for non-valid data:
     * 1: empty
     * 2: doesn't match a particular format
     */
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
        $st = "INSERT INTO admins (username, password, creationDate) VALUES (:username, :password, CURRENT_TIMESTAMP);";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $isDataNotValid = $this->dataValidator();
        if($isDataNotValid){
            view("admin-signup", ['signup-errors' => $isDataNotValid]);
            die();
        }

        $res = $sql->execute(
        $st, [
        ':username' => $username,
        ':password' => $password,
        ]);

        if(!$res['status']){
            view("admin-signup", ['signup-errors' => $res['errors'][1]]);
            die();
        }

        session_start();
        $_SESSION['signup-successful'] = 1;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin');
        die();
    }
}

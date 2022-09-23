<?php

namespace Cms\Controller\Routes\Wrappers;
use Cms\Router\Request;

session_start();

class ProtectedRouteController {

    protected static $instance = null;
    protected Request $request;

    public static function exec(Request $request, string $Class){
        if(!self::$instance)
            self::$instance = new $Class();

        if(!self::isAuthenticated()) return;

        self::$instance->init($request);
    }

    private static function isAuthenticated() : bool {
        if(!isset($_SESSION['userId'])){
            self::redirect();
            return false;
        }

        return true;
    }

    protected function checkIfEmpty($data, $redirectView, $redirectArgs){
        if(!$data){
            view($redirectView, $redirectArgs);
            die();
        }
    }

    private static function redirect(){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/login');
        die();
    }

    protected function init(Request $request) : void {
        $this->request = $request;

        $request_method = strtolower($request->method());
        self::$instance->$request_method();
    }
}
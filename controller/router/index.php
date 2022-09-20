<?php

namespace Cms\Routes;
use Cms\Routes\Request;

require_once "Request.php";
define('__CONTROLLER_ROUTE_PATH__', "Cms\\Controller\\Routes\\");

class Router {

    private static Request $request;

    public static function init() : void {
        self::initRequest();
        self::exec();
    }

    private static function initRequest() : void {
        $url =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $params = self::splitParams(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
        $controller = strlen($url) == 1 ? "home" : explode("/", $url)[1];

        self::$request = new Request($url, $params, $controller);
    }

    // converts string params into associative array params
    private static function splitParams($params) : array {
        parse_str($params, $arr);

        return $arr;
    }

    // moves request to the controller route.
    private static function exec() : void {
        $controller = ucfirst(self::$request->controller);
        include("controller/routes/" . $controller . ".php");
        
        $class = __CONTROLLER_ROUTE_PATH__ . $controller;

        $class::getInstance(self::$request, $class);
    }

}
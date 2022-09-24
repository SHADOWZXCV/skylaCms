<?php

namespace Cms\Router;
use Cms\Router\Request;

require_once "Request.php";
define('__CONTROLLER_ROUTE_PATH__', "Cms\\Controller\\Routes\\");
define('__CONTROLLER_PROTECTED_ROUTE_PATH__', "Cms\\Controller\\Routes\\Admin\\");

class Router {
    private static $routes = [
        "/" => "home",
        "/admin" => "admin",
        "/admin/login" => "admin",
        "/admin/signup" => "adminSignup",
        "/admin/manage" => "adminDashboard",
        "/admin/manage/articles" => "adminArticles",
        "/admin/articles" => "adminArticles",
        "/admin/articles/add" => "addArticles",
        "/viewArticle" => "ViewArticle",
    ];

    private static Request $request;

    public static function init() : void {
        self::$request = self::initRequest();
        self::exec();
    }

    private static function initRequest() : Request {
        $url =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $params = self::splitParams(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
        $controller = strlen($url) == 1 ? "home" : explode("/", $url)[1];

        return new Request($url, $params, $controller);
    }

    // converts string params into associative array params
    private static function splitParams($params) : array {
        parse_str($params, $arr);

        return $arr;
    }

    // moves request to the controller route.
    private static function exec() : void {
        
        if(!isset(self::$routes[self::$request->url])){
            view("404");
            die();
        }

        $isAdmin =  strpos(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "admin") > 0 ? "admin/" : "";
        $routeController = self::$routes[self::$request->url];
        $controller = ucfirst($routeController);
        // $controller = ucfirst(self::$request->controller);
        include("controller/routes/" . $isAdmin . $controller . ".php");
        
        $Class = ($isAdmin ? __CONTROLLER_PROTECTED_ROUTE_PATH__ : __CONTROLLER_ROUTE_PATH__) . $controller;

        $Class::exec(self::$request, $Class);
    }

}

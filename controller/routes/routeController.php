<?php

namespace Cms\Controller\Routes;
use Cms\Routes\Request;

class RouteController {

    protected static $instance = null;
    protected static Request $request;

    public static function getInstance(Request $request, string $class){
        if(!self::$instance){
            self::$instance = new $class();
        }

        self::$instance->init($request);
    }

    protected function init(Request $request) : void {
        self::$request = $request;

        $request_method = strtolower($request->method());
        static::$request_method();
    }
}
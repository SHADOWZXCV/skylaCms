<?php

namespace Cms\Controller\Routes\Wrappers;
use Cms\Router\Request;

class RouteController {

    protected static $instance = null;
    protected Request $request;

    public static function exec(Request $request, string $Class){
        if(!self::$instance)
            self::$instance = new $Class();

        self::$instance->init($request);
    }

    protected function init(Request $request) : void {
        $this->request = $request;

        $request_method = strtolower($request->method());
        self::$instance->$request_method();
    }
}
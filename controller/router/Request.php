<?php

namespace Cms\Router;

class Request {
    public $url;
    public $controller;
    private $params;
    private $body;
    private $method;
    
    public function __construct(string $url, array $params, string $controller){
        $this->url = $url;
        $this->params = $params;
        $this->controller = $controller;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->generateJSONBody();
    }

    private function generateJSONBody() : void {
        if($this->method !== 'POST') return;

        $this->body = json_encode($_POST);
    }

    public function method() : string {
        return $this->method;
    }

    public function params() : array {
        return $this->params;
    }
}

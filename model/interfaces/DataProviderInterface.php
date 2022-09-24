<?php

namespace Cms\Model\Interfaces;

abstract class DataProvider {    
    protected static $instance;
    protected function __construct(){
        $this->init();
    }

    protected abstract function init();
    public abstract static function getInstance() : DataProvider;
}
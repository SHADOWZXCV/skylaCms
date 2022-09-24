<?php

namespace Cms\Model;
use Cms\Model\DataProviders\SQLDataProvider;
require_once "model/DataProviders/SQLDataProvider.php";

class Admin {
    public $username;
    public $id;
    public $password;

    public static function getModel($args){
        $sql = SQLDataProvider::getInstance();
        $st = "SELECT id, username, password FROM admins WHERE username = :username AND password = :password;";
        $res = $sql->query(
            $st, $args, 'Admin');

        return $res;
    }

}
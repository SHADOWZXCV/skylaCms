<?php

namespace Cms\Model;
use Cms\Model\DataProviders\SQLDataProvider;
use Cms\Model\Interfaces\Model;

require_once "model/DataProviders/SQLDataProvider.php";
require_once "model/interfaces/ModelInterface.php";

class Admin extends Model {
    public $username;
    public $id;
    public $password;


    public function save(){

    }

    public function delete(){

    }

    public static function getModel($args){
        $sql = SQLDataProvider::getInstance();
        $st = "SELECT id, username, password FROM admins WHERE username = :username AND password = :password;";
        $res = $sql->query(
            $st, $args, 'Admin');

        return $res;
    }

}
<?php

namespace Cms\Model\DataProviders;
use Cms\Model\Interfaces\DataProvider;
use \PDO;

define("__MODELS_PATH__", "Cms\\Model\\");
require"model/interfaces/DataProviderInterface.php";

class SQLDataProvider implements DataProvider {

    private PDO $conn;
    private static SQLDataProvider $instance;

    private function __construct(){
        $this->__connect();
    }

    private function __connect(){
        try {
            $this->conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getInstance() : SQLDataProvider {
        if(isset($instance)) return $instance;
        self::$instance = new SQLDataProvider();

        return self::$instance;
    }

    public function execute(string $sql, $args = null){
        $ps = $this->conn->prepare($sql);

        return ['status' => $ps->execute($args),
        'errors' => $ps->errorinfo()];
    }

    public function query(string $sql, $args = null, string $model = null){
        $ps = $this->conn->prepare($sql);

        $res = $ps->execute($args);

        if($model){
            include('model/Admin.php');
            $data = $ps->fetchAll(PDO::FETCH_CLASS, __MODELS_PATH__ . $model);
        } else {
            $data = $ps->fetchAll();
        }
        
        return ['status' => $res,
        'data' =>  $data,
        'errors' => $ps->errorinfo()];
    }

    // public static function getDataById($id){
        
    // }
    
    // public function setDataOfId($id, $newData){

    // }

    // public function deleteDataById($id){

    // }

    // public function addData($data){

    // }
}
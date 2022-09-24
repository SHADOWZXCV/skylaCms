<?php

namespace Cms\Model\DataProviders;
use Cms\Model\Interfaces\DataProvider;
use \PDO;

define("__MODELS_PATH__", "Cms\\Model\\");
require "model/interfaces/DataProviderInterface.php";

class SQLDataProvider extends DataProvider {
    private PDO $conn;

    protected function init(){
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

    public function execute(string $sql, $args = null) {
        $ps = $this->conn->prepare($sql);
        $res = $ps->execute($args);

        return ['status' => $res,
        'errors' => $ps->errorinfo(),
        'rowsAffected' => $ps->rowCount(),
        ];
    }

    public function executeAdd(string $sql, $args = null){
        $ps = $this->conn->prepare($sql);
        $res = $ps->execute($args);

        return [
        'status' => $res,
        'errors' => $ps->errorinfo(),
        'rowsAffected' => $ps->rowCount(),
        'id' => $this->conn->lastInsertId(),
        ];
    }

    public function query(string $sql, $args = null, string $model = null){
        $ps = $this->conn->prepare($sql);
        $res = $ps->execute($args);

        if($model){
            $data = $ps->fetchAll(PDO::FETCH_CLASS, __MODELS_PATH__ . $model);
        } else {
            $data = $ps->fetchAll();
        }
        
        return [
        'status' => $res,
        'data' =>  $data,
        'errors' => $ps->errorinfo()
        ];
    }

    // TODO: Fix this, doesn't work!
    // public function resetIds($tableName){
    //     $st = 'ALTER TABLE :tablename AUTO_INCREMENT = 1';
    //     $this->execute($st, [
    //         ':tablename' => $tableName,
    //     ]);
    // }
}
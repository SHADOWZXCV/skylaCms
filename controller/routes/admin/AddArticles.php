<?php
namespace Cms\Controller\Routes\Admin;
use Cms\Controller\Routes\Wrappers\ProtectedRouteController;
use Cms\Routes\Request;
use Cms\Model\Article;
use Cms\Model\DataProviders\SQLDataProvider;

require_once "config.php";
require_once "controller/routes/wrappers/ProtectedRouteController.php";
require_once "model/Article.php";
require_once "model/DataProviders/SQLDataProvider.php";

class AddArticles extends ProtectedRouteController {
    
    protected function get(){
        view("admin-articles-add");
    }

    private function dataValidator(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === "" || $password  === ""){
            return 1;
        }

        return 0;
    }

    protected function post(){

        if(isset($_POST['add'])){
            unset($_POST['add']);
            $this->checkIfEmpty($_POST['title'], "admin-articles-add", ['no-data' => 1]);

            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
            ];

            $article = new Article($data);
            $article->addArticle();

            $article = null;
            die();
        }
    }
}

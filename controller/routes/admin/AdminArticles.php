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

class AdminArticles extends ProtectedRouteController {
    
    protected function get(){
        if(!$_GET){
            $data = Article::getArticles();
            view("admin-articles", $data);
            die();
        }

        if($_GET['op']){
            view("admin-articles-". $_GET['op'], [
                "id" => $_GET['id'],
                "title" => $_GET['title']]);
            die();
        }
    }

    protected function post(){
        if(isset($_POST['delete'])){
            if($_POST['delete'] == 'no'){
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
                die();
            }

            $this->checkIfEmpty($_POST['id'], "admin-articles", ['no-data' => 1]);
            Article::deleteArticle($_POST['id']);
        }

        if(isset($_POST['op'])){
            view("admin-articles-". $_POST['op'], $_POST);
            die();
        }

        if(isset($_POST['confirmEdit'])){
            unset($_POST['confirmEdit']);
            $this->checkIfEmpty($_POST['title'], "admin-articles", ['no-data' => 1]);
            $this->checkIfEmpty($_POST['id'], "admin-articles", ['no-data' => 1]);

            $data = [
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
            ];

            Article::editArticle($data);
            die();
        }
    }
}

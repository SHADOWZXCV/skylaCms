<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\Wrappers\RouteController;
use Cms\Routes\Request;
use Cms\Model\Article;

require_once "config.php";
require_once "wrappers/RouteController.php";
require_once "model/Article.php";

class ViewArticle extends RouteController {
    protected function get(){
        $params = $this->request->params();
        if(isset($params)){
            $id = $params['id'];
            $data = Article::getArticleById($id);

            if(!$data){
                view("404");
                die();
            }

            view("article", $data);
        }

    }
}

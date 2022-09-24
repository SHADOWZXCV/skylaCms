<?php
namespace Cms\Controller\Routes;
use Cms\Controller\Routes\Wrappers\RouteController;
use Cms\Routes\Request;
use Cms\Model\Article;

require_once "config.php";
require_once "wrappers/RouteController.php";
require_once "model/Article.php";

class Home extends RouteController {
    protected function get(){
        $data = Article::getLatestArticles();
        // prevent the not-completed articles to be public.
        $data = array_filter($data, array($this, 'checkIfEmpty'));

        view("index", $data);
        die();
    }

    private function checkIfEmpty($article){
        return !empty($article->content);
    }
}

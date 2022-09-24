<?php

namespace Cms\Model;
use Cms\Model\DataProviders\SQLDataProvider;

require_once "model/DataProviders/SQLDataProvider.php";

class Article {

	public function __construct( $data = array() ){
		if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
		if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
		if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
		if ( isset( $data['description'] ) ) $this->description = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['description'] );
		if ( isset( $data['content'] ) ) $this->content = $data['content'];
	}

	public static function getArticles(){
		$sql = SQLDataProvider::getInstance();
		$st = "SELECT * FROM articles;";
		$res = $sql->query($st, [], 'article');
		
		if(!$res['status']){
			return false;
		}

		if(!$res['data'])
			$sql->resetIds('articles');

			return $res['data'];
	}

    public static function getLatestArticles(){
		$sql = SQLDataProvider::getInstance();
		$st = "SELECT * FROM articles ORDER BY ID DESC LIMIT 5;";
		$res = $sql->query($st, [], 'article');
		
		if(!$res['status']){
			return false;
		}

		if(!$res['data'])
			$sql->resetIds('articles');

			return $res['data'];
	}

    public static function getArticleById($id){
		$sql = SQLDataProvider::getInstance();
		$st = "SELECT * FROM articles WHERE id = :id;";
		$res = $sql->query($st, [
            ':id' => $id
        ], 'article');
		
		if(!$res['status']){
			return false;
		}

		if(!$res['data'])
			$sql->resetIds('articles');

			return $res['data'];
	}

	public static function deleteArticle($id){
        $sql = SQLDataProvider::getInstance();

        $st = "DELETE FROM articles WHERE id = :id;";

        $res = $sql->execute(
        $st, [
        ':id' => $id,
        ]);

        if(!$res['status']){
            $_SESSION['article-errors'] = $res['errors'][1];
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
            die();
            return;
        }

        if(!$res['rowsAffected']){
            $_SESSION['delete-no-article-found'] = $id;
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
            die();
            return;
        }

        $_SESSION['deleted-article'] = $id;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
        die();
	}

    public function addArticle(){
        $sql = SQLDataProvider::getInstance();
        $st = "INSERT INTO articles (title, description, content, publicationDate)
        VALUES (:title, :description, :content, CURRENT_TIMESTAMP);";

        $res = $sql->executeAdd(
        $st, [
            ':title' => $this->title,
            ':description' => $this->description,
            ':content' => $this->content,
        ]);

        if(!$res['status']){
            $_SESSION['article-errors'] = $res['errors'][1];
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
            die();
            return;
        }

        $_SESSION['added-article'] = $res['id'];
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
        die();
	}

    public static function editArticle($data){

        $sql = SQLDataProvider::getInstance();
        $st = "UPDATE articles SET title = :title, description = :description, content = :content
        , publicationDate = CURRENT_TIMESTAMP WHERE id= :id ;";

        $res = $sql->execute(
        $st, [
        ':title' => $data['title'],
        ':description' => $data['description'],
        ':content' => $data['content'],
        ':id' => $data['id'],
        ]);

        if(!$res['status']){
            $_SESSION['article-errors'] = $res['errors'][1];
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
            die();
        }

        if(!$res['rowsAffected']){
            $_SESSION['edit-no-article-found'] = $data['id'];
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
            die();
        }

        $_SESSION['edited-article'] = $data['id'];
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/articles');
        die();
	}
}
<?php
class Article {

    public function __construct( $data = array() ){
        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
        if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
        if ( isset( $data['summary'] ) ) $this->summary = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary'] );
        if ( isset( $data['content'] ) ) $this->content = $data['content'];
    }

    
}
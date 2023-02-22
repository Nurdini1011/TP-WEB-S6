<?php

class Article extends Model {

    public function __construct() {
        $this->table = "posts";
        $this->getConnection();
    }

    public function findBySlug(string $slug){
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE slug = "' . $slug '"';
         
    }
}
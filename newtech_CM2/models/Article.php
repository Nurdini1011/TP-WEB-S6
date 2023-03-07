<?php

require_once("../app/Model.php");

class Article extends Model {

    public function __construct() {

        $this->table = "posts";
        $this->getConnexion();

    }

    public function findBySlug(string $slug){

        $sql = "SELECT * FROM " . $this->table . " WHERE slug ='" . $slug . "'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();

    }
}

$article = new Article();
$article->getAll();
$articleFound = $article->findBySlug("slug1");
var_dump($articleFound);
echo "{$articleFound['title']}\n";


?>
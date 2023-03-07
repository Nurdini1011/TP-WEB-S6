<?php

class Article extends Controller {

    public function index(){

        echo "<h1>Bienvenue sur l'acceuil</h1>";
        $this->loadModel("Article");
        $articles = $this->Article->getAll();
        //var_dump($articles);
        $this->render('index', ['articles' => $articles]);

    }

    public function searchBySlug($slug){

        $this->loadModel("Article");
        $articles = $this->Article->findBySlug($slug);
        //var_dump($articles);
        $this->render('index', ['articles' => $articles]);

    }
}

?>
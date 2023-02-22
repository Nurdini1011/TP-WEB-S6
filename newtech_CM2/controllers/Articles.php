<?php

class Article extends Controller {

    public function index(){

        echo "<h1>Bienvenue sur l'acceuil</h1>";
        $this->loadModel("Article");
        $articles = $this->Article->getAll();
        //var_dump($posts);
        $this->render('index', ['articles' => $articles]);

    }
}

?>
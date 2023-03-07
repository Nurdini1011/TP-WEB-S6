<?php

abstract class Controller {

    public function loadModel(string $model) {
        require_once(ROOT . 'models/' . $model . '.php');
        $this->model = new $model();
    }

    // charger le modèle et l'instancier
    //le nom de vue + les donnees
    public function render($vue, array $data = []){

        //var_dump($data);
        extract($data);
        echo "<h1>**********</h1>";
        //var_dump($articles);
        require_once(ROOT . 'view/' . strtolower(get_class($this)) . '/' . $vue);
        
    }
}

?>
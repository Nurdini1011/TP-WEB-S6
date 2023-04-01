<?php

abstract class Controller {

    public function loadModel(string $model) {
        require_once(APPROOT . 'models/' . $model . '.php');
        return new $model();
    }

    // charger le modèle et l'instancier
    //le nom de vue + les donnees
    public function render($vue, array $data = []){

        if(!empty($data))
            extract($data);

        //On génère la vue
        require_once(APPROOT . 'views/inc/header.php');

        require_once(APPROOT . 'views' . $vue . '.php');

        // On fabrique le "template" de footer
        require_once(APPROOT . 'views/inc/footer.php');
        
        
    }
}

?>
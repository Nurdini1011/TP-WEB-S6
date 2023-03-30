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

        // On démarre le buffer de sortie 
        ob_start();

        //On génère la vue
        require_once(APPROOT . 'views/inc/header.php');

        //On stocke le contenu dans Scontent
        $content = ob_get_clean();

        // On fabrique le "template" de footer
        require_once(APPROOT . 'views/inc/footer.php');
        
        
    }
}

?>
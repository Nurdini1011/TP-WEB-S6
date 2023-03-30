<?php

class Controller {

    public function loadModel(string $model) {
        require_once(ROOT . 'models/' . $model . '.php');
        $this->model = new $model();
    }

    // charger le modèle et l'instancier
    //le nom de vue + les donnees
    public function render($vue, array $data = []){

        if(!empty($data))
            extract($data);

        // On démarre le buffer de sortie 
        ob_start();

        //On génère la vue
        require_once(ROOT . 'views/' . strtolower(get_class($this)) . '/' . $vue . 'php');

        //On stocke le contenu dans Scontent
        $content = ob_get_clean();

        // On fabrique le "template" 
        require_once(ROOT . 'views/layout/default.php');
        
        
    }

    public function index(){

        echo "<h1>Bienvenue sur l'acceuil</h1>";
        $this->loadModel("Article");
        $articles = $this->Article->getAll();
        //var_dump($articles);
        $this->render('index', ['articles' => $articles]);

    }

    public function searchUserByName($username){

        $this->loadModel("User");
        $user = $this->User->findBySlug($username);
        //var_dump($articles);
        $this->render('index', ['User' => $user]);

    }


}

?>
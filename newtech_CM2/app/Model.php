<?php

abstract class Model {
    // modele de donnees de haut niveaux
    private $host = "localhost";

    private $dbname = "blog";

    private $username = "root";

    private $password = "orange";

    protected $_connexion;

    public $table;

    public $id;

    public function getConnexion(){
        $this->_connexion = null;
        try {
            //l'objet utilisé ici sera PDO
            $this->_connexion = new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname,
                $this->username,
                $this->password
            );
        } catch (PDOException $exciption) {
            echo "Err : " . $exciption->getMessage();
        }
    }


    public function getAll (){

        $sql = "SELECT * FROM " . $this->table;
        //le . est utilisé pour la concaténation, ici c'est une chaine de characteres puisqu
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    //afin de récupérer les données de la table:

    public function getOne (){

        //id est la clé primaire de ja table
        $sgl = "SELECT * FROM " . $this->table . ' where id=' . $this->id;
        //$ connexion reference un objet géré par le serveur web, et qui jue en qlq sorte le
        $query = $this->_connexion->prepare($sql);
        //prepare retourne un objet,, ici on a une requete compilée, préparée, préte à etre ‹
        $query->execute;
        //query represente ici la table, et une fois la methode excecute lancée, on excecute
        return $query->fetch();

    }

}

// test connection to base de donnée
// $newModel = new Model();
// $newModel->getConnexion();
// echo "hiii******";


?>
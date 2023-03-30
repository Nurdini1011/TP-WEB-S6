<?php

abstract class Model {
    // modele de donnees de haut niveaux
    protected $_connexion;

    public function getConnexion(){
        $this->_connexion = null;
        try {
            //l'objet utilisé ici sera PDO
            $this->_connexion = new PDO(
                'mysql:host=localhost;dbname=tp_connection',
                'root',
                'orange'
            );
        } catch (PDOException $exciption) {
            echo "Err : " . $exciption->getMessage();
        }
    }

    /*
    +------------+--------------+------+-----+---------+----------------+
    | Field      | Type         | Null | Key | Default | Extra          |
    +------------+--------------+------+-----+---------+----------------+
    | id         | int(11)      | NO   | PRI | NULL    | auto_increment |
    | username   | varchar(255) | NO   |     | NULL    |                |
    | email      | varchar(255) | NO   |     | NULL    |                |
    | password   | varchar(255) | NO   |     | NULL    |                |
    | role       | varchar(255) | YES  |     | NULL    |                |
    | created_at | date         | NO   |     | NULL    |                |
    | updated_at | date         | NO   |     | NULL    |                |
    +------------+--------------+------+-----+---------+----------------+
    */

    public function updateUser($idUser){
        // fonction to add User

    }


    


}

?>
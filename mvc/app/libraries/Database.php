<?php

class Database {
    // modele de donnees de haut niveaux
    private $host = DB_HOST;

    private $dbname = DB_NAME;

    private $username = DB_USER;

    private $password = DB_PASSWORD;

    private $_connexion;

    private $statement;

    public function __construct() {
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

    public function prepare($sql) {
        try {
            $this->statement = $this->_connexion->prepare($sql);
            return true;
        } catch (PDOException $e) {
            // handle exception
            return false;
        }
    }
    

    public function execute() {

        $this->statement->execute();

    }

    public function single() {

        try {
            $this->execute();
            return $this->statement->fetch();
        } catch (PDOException $e) {
            // handle exception
            return false;
        }

    }

    public function resultSet (){

        try {
            $this->execute();
            return $this->statement->fetchAll();
        } catch (PDOException $e) {
            // handle exception
            return false;
        }

    }

    public function rowCount (){
        return $this->statement->rowCount();
    }

}


?>
<?php

class User {

    public $table = "Users";

    public $id;

    protected $_connexion;

    public $username;

    public $password;

    private $email;

    private $role;

    private $created_at;

    private $updated_at;

    public function __construct() {
        $this->getConnexion();
    }

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
  

    public function check(){

        $sql = "SELECT id FROM " . $this->table . " WHERE username ='" . $this->username . "' and password ='" . $this->password . "'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $account = $query->fetch();
        $query->closeCursor();
        
        if($account['id'] === NULL)
            return -1;
        else
            return 0; 

    }

}

?>
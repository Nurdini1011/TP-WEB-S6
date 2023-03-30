<?php

require_once('Model.php');

class User extends Model {

    public $table = "Users";

    public $id;

    public $username;

    public $password;

    private $email;

    private $role;

    private $created_at;

    private $updated_at;

    public function __construct() {
        $this->getConnexion();
        $this->$table = "Users";
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

    public function addUser($username, $email, $password, $role){
        $now = date("Y-m-d H:i:s"); // get current time
    
        $sql = "INSERT INTO Users (username, email, password, role, created_at, updated_at) VALUES (:username, :email, :password, :role, :created_at, :updated_at)";
        $query = $this->_connexion->prepare($sql);
        $marq=array('nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'pseudo'=>$_POST['login'],'mdp'=>$_POST['mdp'],'mail'=>$_POST['mail'],'jour'=>$_POST['jour'],'mois'=>$_POST['mois'],'annee'=>$_POST['année'],'genre'=>$_POST['genre'],'relation'=>$_POST['relation']);
        $query->execute($marq);
        $query->closeCursor();
    }

}

?>
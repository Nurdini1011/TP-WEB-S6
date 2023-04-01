<?php

class Doctor {

    private $id;
    private $name;
    private $db;

    public function __construct() {
        echo "doctor models constructor\n";
        $this->db = new Database();
    }

    public function fetchDoctorByEmail($email){

        $sql = "SELECT * FROM Doctors WHERE email ='" . $email . "'";
        $this->db->prepare($sql);
        $this->db->execute();
        $result = $this->db->single();

        if($this->db->rowCount() === 0)
            return false;
        else
            return true;

    }

    public function login($email, $password){

        $sql = "SELECT * FROM Doctors WHERE email ='" . $email . "'";
        $this->db->prepare($sql);
        $this->db->execute();
        $result = $this->db->single();

        // verify the password in the database
        $verify = password_verify($password, $result['password']);
        echo $verify;

    }

    public function register($data){

        try {
            // register Doctor in database
            $sql = "INSERT INTO `Doctors` (`idDoctor`, `name`, `email`,`password`, `specialty`) 
                VALUES (NULL,'".$data['name']."','".$data['email']."', '".$data['password']."', '".$data['specialty']."')";
                echo "$sql\n";
            $this->db->prepare($sql);
            $this->db->execute();
            $this->db->single();
            return true;

        } catch (PDOException $e) {
            // handle exception
            return false;
        }
    }

    public function getDoctorById($idDoctor){

        $sql = "SELECT * FROM Doctors WHERE idDoctor ='" . $idDoctor . "'";
        $this->db->prepare($sql);
        $this->db->execute();
        $result = $this->db->single();

        if($this->db->rowCount() === 0)
            return false;
        else
            return $result;

    }
    
}

?>
<?php

require_once('../libraries/Database.php');

class Doctor {

    private $id;
    private $name;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchDoctorByEmail($email){

        $sql = "SELECT * FROM Doctors WHERE email ='" . $email . "'";
        $this->db->prepare($sql);
        $this->db->execute();
        $this->db->single();

        if($this->db->rowCount() === 0)
            return false;
        else
            return true;

    }

    public function login($email, $password){

        $sql = "SELECT * FROM Doctors WHERE email ='" . $email . "'";
        $this->db->prepare($sql);
        $this->db->execute();

        // verify the password in the database
        $verify = password_verify($password, $this->db->single()->password);
        echo $verify;

    }

    public function register($data){

        try {
            // register Doctor in database
            $sql = "INSERT INTO `Doctors` (`idDoctor`, `name`, `email`,`password`, `specialty`) 
                VALUES (NULL,'".$data['name']."','".$data['email']."', '".$data['password']."', '".$data['specialty']."')";
            $this->bd->prepare($sql);
            $this->db->execute();
            $this->db->single();
            return true;

        } catch (PDOException $e) {
            // handle exception
            return false;
        }
    }

    // if (isset($account['password']) && $account['password'] === $this->password) {
    //     // ...
    // }

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

$doctor = new Doctor();
// check the doctor by ID and it return an array
$getDoctor = $doctor->getDoctorById(1);

// afficher array
var_dump($getDoctor);

$existedDoctor = $doctor->fetchDoctorByEmail('dini@gmail.com');
$notExistedDoctor = $doctor->fetchDoctorByEmail('sarag@gmail.com');
echo "existed $existedDoctor\n";
echo "not existed $notExistedDoctor\n";


?>
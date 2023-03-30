<?php

class Doctors extends Controller {

    private $doctorModel;

    public function __construct() {

        // verify if the doctor is logged in
        if(isLoggedIn())
            redirect('pages/index');

        $this->doctorModel = $this->model("Doctor");
    }    

    public function register(){

        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'specialty' => $_POST['specialty'],
            'name_error' => ($_POST['name'] === '') ? 'Must put your name':'' ,
            'email_error' => $this->$doctorModel->fetchDoctorByEmail($_POST['email']) ? 'Email already exist' : '',
            'password_error' => (strlen($_POST['password']) < 6) ? 'Password less than 6' :'' ,
            'confirm_error' => '');

        // if the user sent $_POST
        if (isset($_POST['submit'])) {

            // register Doctor in database using register from the Model
            if($this->$doctorModel->register($data) && $data['name_error'] === '' && $data['email_error'] === '' && $data['password_error'] === '')
                redirect("doctors/login.php");
            else
                $this->render('../views/doctor/doctors/register.php', $data);
            
        } else {
            // if the user ask for the form
            // show the register.php in /views/doctors
            $this->render('../views/doctors/register.php', $data);
        
        }
    }
}

?>
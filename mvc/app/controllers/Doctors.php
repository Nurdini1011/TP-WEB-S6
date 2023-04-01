<?php

class Doctors extends Controller {

    private $doctorModel;

    public function __construct() {

        // verify if the doctor is logged in
        if(isLoggedIn())
            redirect('Pages/index');

        $this->doctorModel = $this->loadModel("Doctor");
        echo "doctor model constructor\n";
    }    

    public function register(){

        // if the user sent $_POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // data from post
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'specialty' => $_POST['specialty'],
                'name_error' => ($_POST['name'] === '') ? 'Must put your name':'' ,
                'email_error' => $this->$doctorModel->fetchDoctorByEmail($_POST['email']) ? 'Email already exist' : '',
                'password_error' => (strlen($_POST['password']) < 6) ? 'Password less than 6' :'' ,
                'confirm_error' => '');

            // register Doctor in database using register from the Model
            if($this->$doctorModel->register($data) && $data['name_error'] === '' && $data['email_error'] === '' && $data['password_error'] === '')
                redirect("doctors/login");
            else
                $this->render('doctors/register', $data);
            
        } else {
            // if the user ask for the form
            // show the register.php in /views/doctors
            $this->render('doctors/register', $data);
        
        }
    }

    public function login()
    {
        echo var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginInfo = [
                "email" => $_POST['email'],
                "password" => $_POST['mdp'],
                "email_error" => false,
                "password_error" => false
            ];
            if ($this->doctorModel->fetchDoctorByEmail($_POST['email'])) {
                $password = $loginInfo['password'];
                if ($this->doctorModel->login($email, $password)) {
                    $result = $this->doctorModel->login($email, $password);
                    $this->createDoctorSession(compact('result')['result']);
                } else {
                    echo "Wrong password, try again";
                    $loginInfo['password_error'] = true;
                    $this->render("doctors/login", $data = []);
                }
            } else {
                echo "Wrong email or user not exists";
                $loginInfo['email_error'] = true;
                $this->render("doctors/login", $data = []);
            }

        } else {
            $this->render("/doctors/login", $data = []);
        }
    }

    public function createDoctorSession($doctor)
    {
        $_SESSION['idDoctor'] = $doctor['idDoctor'];
        $_SESSION['doctor_name'] = $doctor['name'];
        $_SESSION['doctor_email'] = $doctor['email'];
        redirect('pages/index');
    }
    
    public function logout()
    {
        session_destroy();
        unset($_SESSION['doctor_id']);
        redirect('doctors/login');
    }

    

}

?>
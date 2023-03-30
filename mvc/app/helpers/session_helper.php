<?php
    session_start();

    function isLoggedIn(){
        if (isset($_SESSION['idDoctor']))
            return true;
        else
            return false;     
    }

?>
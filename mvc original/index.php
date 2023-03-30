<?php
    // session_start(); // start http session

    // $_SESSION['counter']++;
    // // echo $_SESSION['counter'];

    // $arr = [
    //     "Fraise" => 12,
    //     "Orange" => 5,
    //     "Biscuits" => 7
    // ];

    // $_SESSION['panier'] = $arr;
    // echo "....Prix fraise : ";
    // echo $_SESSION['panier']['Fraise'];
    // echo "<br/>";
    // var_dump($_SESSION);

    // die();
    
    // define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
    define('ROOT', dirname($_SERVER['SCRIPT_FILENAME']));
    require_once(ROOT . '/app/Model.php');
    require_once(ROOT . '/app/Controller.php');
    // echo $param[0];
   
    //var_dump($_GET);
    $params = explode("/", $_GET['p']);
    echo "GET['p'] : {$_GET['p']}"; 

    //var_dump($params):
    if ($params[0] != "") {
        $controller = ucfirst($params[0]); // mettre la première lettre en majuscule

        //echo "<h1>controller= $controller</h1>";
        $action = (isset ($params[1])) ? $params[1] : "index";
        //echo "chl>action= Saction</h1>";
        require_once(ROOT . 'controllers/' . $controller . '.php');
        $controller = new $controller(); // instancier le controller

        // verifier si la méthode exist
        if (method_exists($controller, $action)) {
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller, $action], $params); // $controller->$action($params);  
        } else {
            http_response_code(404);
            echo "La page demandée n'existe pas";
        }
    } else {

    }
?>

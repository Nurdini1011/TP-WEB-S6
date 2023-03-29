<?php
    session_start();

    if (isset($_POST['submit']))
    {
        // bouton submit pressé, je traite le formulaire
        if ((isset($_POST['login'])) && (isset($_POST['pass'])))
        {
            require_once('./models/User.php');
            $user = new User();
        
            $user->username = $_POST['login'];
            $user->password = $_POST['pass'];
        
            $existed = $user->check();
        
            if ($existed === -1){
                header('Location:./login.php?msg=notexisted');
            }   
            else{
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['pass'];
                header('Location:./login.php');
            };

        };

        
    };

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./views/style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com"/>
	<link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"/>
	
	<title>TP</title>
	</head>
	<body>


        <section>
			<!-- Titre -->
            <?php
               
                if ($_GET['msg']=="deconnex"){
                    echo "</br>";
                    echo "<div class='rectf'>Vous avez été déconnecté. Veuillez vous identifier.</div> ";
                }

                if ($_GET['msg']=="notexisted"){
                    echo "</br>";
                    echo "<div class='rectf'>Vous n'avez pas de compte. Veuillez creer pour se connecter !</div> ";
                }

                // verifier la session
                if (!isset($_SESSION['login']))
                {
                    echo '
                        <form method="POST" action="">
                            <label for="login"></label><input id="login" name="login" type="text" placeholder="Login" required />
                            <label for="mdp"></label><input id="mdp" name="pass" type="password"  placeholder="Mot de passe" required />
                            <button id="sub"  name="submit" type="submit" value="Connexion">Connexion</button>
                        </form>';

                    // Bouton de inscription
                    require_once('./views/signup.php');              
                }

                else
                { 
                    echo "</br>";
                    echo "<div class='rectf'>Hi {$_SESSION['login']}, you are connected !</div> ";
                    echo '<div class="rectf"><a href="logout.php" title="Accueil de la section membre">Logout</a></div>';
                
                }; 
            
                
            ?>
        </section>
		<div id="opac"></div>

       
        <!-- Titre -->
        <div class=titreee>
            <p>Welcome to Nurdini's page !</p>
        </div>
        <script src="./views/signup.js" type="text/javascript"></script>
    </body>
</html>
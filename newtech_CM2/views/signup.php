<?php
echo '
    <div id="boutonpopup">
        <button onclick="ouvrirlapopup()" id="creer"  name="envoi" type="submit" value="envoi">Créer un compte</button>
    </div>
    <div id="inscrp">
    <div class="sousinscrp">
            <div class="zz">S\'inscrire</div> 
            <button id="fermer" onclick="fermerlapopup()"> X </button>
            <div class="st">C\'est rapide et facile.</div>
        </div>
        <form method="POST" action="./inscription.php">
            <!-- Pseudo -->
            <label for="login"></label><input class="log" name="login" type="text" placeholder="Login" autocomplete="off" required />
            
            <!-- Mdp -->
            <label for="mdp"></label><input class="log" name="mdp" type="password"  placeholder="Nouveau mot de passe" autocomplete="off" required />
            
            <!--mail--> 
            <label for="mail"></label><input class="log" name="mail" type="email" placeholder="Mail" />                      

            <!-- Relation -->
            <div class="vache">
                <label for="relation">Rôle</label>
            </div>
            <div class="zouzou">
                
                <div class="qqq">
                    <label for="relation"></label>Célibataire<input type= "radio" value="Celibataire"  name= "relation" class= "celib" /> 
                </div>
                <div class="qqq">
                    <label for="relation1"></label>En couple<input type= "radio" value="En couple" name= "relation" class= "couple" />
                </div>
                <div class="qqq">
                    <label for="relation"></label>Autre<input type= "radio" value="Autre" name= "relation" class= "autre" />
                </div>
            </div>
    
            <button id="sinsc"  name="envoi" type="submit" value="envoi">S\'inscrire</button>

        </form>
    </div> ';
?>

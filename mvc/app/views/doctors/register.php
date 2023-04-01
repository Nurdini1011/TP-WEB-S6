<div id="boutonpopup">
    <button onclick="ouvrirlapopup()"  name="envoi" type="submit" value="envoi">Register now</button>
    <div class="trait"></div>
    <!-- Bloc s'inscrire -->
    
        <div id="inscrp">
            <form action="" method="post">
            <button id="fermer-button" onclick="fermerlapopup()"> X </button>   
                  
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Register </em> &amp; Save <span> your patients' information</span></h2>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input name="name" id="name" type="tewt" placeholder="Name" autocomplete="off" required="">
                      </fieldset>
                    </div> 
                    <div class="col-lg-12">
                      <fieldset>
                        <input name="email" id="email" type="email" placeholder="Email" autocomplete="off" required="">
                      </fieldset>
                    </div> 
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="password" id="password" placeholder="Password" autocomplete="off" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="password2" id="password2" placeholder="Confirm your password" autocomplete="off" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <!-- Relation -->
                      <div class="v">
                        <label for="relation">Relation</label>
                      </div>
                      <div class="row">
                        
                        <div>
                          <label for="relation"></label>Célibataire<input type= "radio" value="Celibataire"  name= "relation" class= "celib" /> 
                        </div>
                        <div>
                          <label for="relation"></label>En couple<input type= "radio" value="En couple" name= "relation" class= "couple" />
                        </div>
                        <div>
                          <label for="relation"></label>Autre<input type= "radio" value="Autre" name= "relation" class= "autre" />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Register</button>
                      </fieldset>
                    </div>
                  </form> 
</div> 

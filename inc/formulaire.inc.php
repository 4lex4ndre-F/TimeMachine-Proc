<?php
require('connexion.php');
require('inscription.php');





?>
<?= $message ?>
<div class="container">

    <!-- integration de modal pour la connexion et l'inscription -->



















    <!-- ci dessous les formulaires brut à conserver pour les names, id, etc. -->
    <p>es formualires sont ulra moches mais ils fonctionnent bien apperement...<br>à Modaliser et stylifier<p>
    <div class="row">
        <div class="col-sm-12">
            <!-- CONNEXION -->
            <form method="post" class="test_form">
                <p>Login</p>
                <div class="form-2">
                    <label for="login">Pseudo ou mot de passe</label>
                    <input type="text" name="login" id="login">
                </div>
                <div class="form-2">
                    <label for="mdp">MDP</label>
                    <input type="text" name="mdp" id="mdp">
                </div>
                <input type="submit" value="Connexion" class="bouton">        
            </form>
        </div><!-- fin div.col-sm-12 -->
    </div><!-- fin .row -->


    <div class="row">
        <div class="col-sm-12">
        <!-- MODAL INSCRIPTION -->
            <form method="post" action="">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Votre nom" value="<?php echo $lastname; ?>">				
                </div>	
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                </div>
                
                <div class="form-group">
                    <label for="gender">Sexe</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="m">Homme</option>
                        <option value="f" <?php if($gender =='f'){echo 'selected';} ?> >femme</option>
                    </select>
                </div>	
            
            
                <div class="form-group">
                    <label for="pseudo">pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo" value="<?php echo $pseudo; ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                </div>
                
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="" value="<?php echo $password; ?>">
                </div>
                
                <div class="form-group">
                    <label for="passwordcheck">confirmation du mot de passe</label>
                    <input type="text" name="passwordcheck" id="passwordcheck" class="form-control" placeholder="" value="<?php echo $passwordcheck; ?>">
                </div>          
                
                
                <div class="form-group">
                        <button class="form-control btn btn-success">valider</button>
                
                </div>
            </form>






        </div><!-- fin div.col-sm-12 -->
    </div><!-- fin .row -->
</div>
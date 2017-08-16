<?php
require('connexion.php');





?>
<?= $message ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- CONNEXION -->
            <form method="post" class="test_form">
                <p>Login</p>
                <div class="form-2">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo">
                </div>
                <div class="form-2">
                    <label for="password">MDP</label>
                    <input type="text" name="password" id="password">
                </div>
                <input type="submit" value="C'est parti !" class="bouton">        
            </form>
        </div><!-- fin div.col-sm-12 -->
    </div><!-- fin .row -->


    <div class="row">
        <div class="col-sm-12">
        <!-- MODAL INSCRIPTION -->
        <form method="post" class="test_form">
            <p>Pas encore membre ?</p>
            <button>Inscrivez-vous...</button>
        </form>
        </div><!-- fin div.col-sm-12 -->
    </div><!-- fin .row -->
</div>
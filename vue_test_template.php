<?php
require("inc/init.inc.php");

// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");  
require("inc/nav.inc.php");  
?>

    <!-- appel du formulaire -->
    <?php require('formulaire.inc.php'); ?>

    
    <!-- PARTIE DYNAMIQUE DU SITE -->
    <!-- change en fonction de la page chargée -->
    <div class="container">
        <div class="contenu-page">
            <p>Affichage qui dépendra de la page chargée</p>
        </div>
    </div>



<?php
require("inc/footer.inc.php");

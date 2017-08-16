<?php
require("inc/init.inc.php");

// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");  
?>

    <!-- appel du formulaire -->
    <?php require('inc/formulaire.inc.php'); ?>

    <div class="container">

        <div class="row vignette">
            <div class="cadre col-sm-4 col-sm-offset-1">

                <div class="cercle">
                    cadre Stories
                </div>
                <div>
                    formulaire de recherche
                </div>

            </div><!-- cadre Stories -->

            <div class="cadre col-sm-4 col-sm-offset-2">

                <div class="cercle">
                    cadre Photos
                </div>
                <div>
                    formulaire de recherche
                </div>

            </div><!-- fin cadre Photos -->
        </div><!-- fin .row -->

    </div><!-- fin .container -->



<?php
require("inc/footer.inc.php");

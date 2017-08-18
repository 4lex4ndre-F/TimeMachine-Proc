<?php
    // Il faut vérifier que l'utilsateur est admin aussi à ce niveau pour l'affichage de l'option d'administration dans le menu dropdown

    //autorisation d'accès - reprise d'une partie du code de la page espace_admin.php à défaut de mieux pour l'instant
    $autorisation = null;
    // appel de la fonction verifAdmin
    if(isset($_SESSION['utilisateur']))
        $autorisation = $_SESSION['utilisateur']['status'];


    // deconnexion
    if(isset($_GET['action']) && $_GET['action'] == 'deconnexion' )
    {
        session_destroy();
        header("location:test_homepage.php");
    }
?>

    <!-- PARTIE HAUTE DU SITE -->
    <div class="container">
        <div class="row">
            <!-- LOGO h1 provisoire -->
            <div class="top-left">
                <h1>PictStories</h1>
            </div>
            <div class="top-right btn-group">

                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- Indique le pseudo de l'user et permetra (A IMPLEMENTER) de se déconnecter / gérer son espace perso -->                
                    <?php
                        if(!empty($_SESSION['utilisateur']))
                            echo $_SESSION['utilisateur']['pseudo'] . ' </a>';
                        else
                            echo 'Connexion / Inscription ';
                    ?><span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profil</a></li>
                    <?php // A FAIRE MARCHER PUTAIN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! sortir la function de l'init ?
                        if($autorisation == 1) {
                            echo '<li><a href="espace_admin.php">Admin</a></li>';
                        }
                    ?>
                    <li role="separator" class="divider"></li>
                    <li><a href="?action=deconnexion">Se déconnecter</a></li>
                </ul>
                
            </div><!-- fin .top-right -->
        </div><!-- fin .row -->
        <div class="clear-fix"></div>

        <!-- Sous-titre -->
        <p>sous-titre :ligne 1<br>ligne 2<br>ligne 3</p>
        




    </div><!-- fin .container -->
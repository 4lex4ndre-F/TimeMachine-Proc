<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet PictStories</title>

    <!-- Appel Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- css custom -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">






</head>
<body>

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
                    <li role="separator" class="divider"></li>
                    <li><a href="?action=deconnexion">Se déconnecter</a></li>
                </ul>
                
            </div><!-- fin .top-right -->
        </div><!-- fin .row -->
        <div class="clear-fix"></div>

        <!-- Sous-titre -->
        <p>sous-titre :ligne 1<br>ligne 2<br>ligne 3</p>
        




    </div><!-- fin .container -->
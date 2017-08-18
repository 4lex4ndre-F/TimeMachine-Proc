<?php

// CETTE PAGE CONTIENT LES FONCTIONS PRINCIPALES DU SITE
// Elle ne peuvent être appellée que par les pages qui require('init.inc.php')

// fonction pour savoir si un utilisateur est connecté
function utilisateur_est_connecte()
{
    if(isset($_SESSION['utilisateur']))
    {
        // si l'indice utilisateur existe alors l'utilisateur est connecté car il est passé par la page de connexion
        return true; // on sort de la fonction et le return false en dessous ne sera pas pris en compte.
    }
    return false; // si on rentre pas dans le if, on retourne false.
}

// fonction de vérif admin
function verifAdmin($status)
{
    if($status == 1) {
        return true;
    } else {
        return false;
    }
}



<?php
// init.inc.php est chargé en premier par toutes les pages constituant le site.


// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=timemachine', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// appel des fichiers contenant certaines fonctions.
require_once("function.inc.php");


// création de variables pouvant nous servir dans le cadre du projet:
// variable pour afficher des messages à l'utilisateur
$message = "";

// ouverture de la session
if(!isset($_SESSION))
{
    session_start();
}




// ---------------------------------- LIENS INTERNES AU SITE ----------------------------------
// définition de constante pour le chemin absolu ainsi que pour la racine serveur
// racine site
// /!\ ATTENTION VERIFIER QUE LE CHEMIN CORRESPOND BIEN A VOTRE CHEMIN LOCAL !!!!!!!!!!!
define("URL", "/Timemachine-proc/"); // modifier le repository chez moi

//racine serveur - nécessaire pour les pièces jointes
// DOCUMENT_ROOT dans $_SERVER
define("RACINE_SERVEUR", $_SERVER['DOCUMENT_ROOT'] . URL);
<?php
require("inc/init.inc.php");
require('inc/admin/admin.php');


/* Description

elle est accessible uniquement si l'user est admin
admin a acces a tout le contenu depuis cet espace avec options de gestion/suppression des entrées de la bdd + outils statistiques
voir travail Philippe

*/


//autorisation d'accès
if(empty($_SESSION['utilisateur'])) {
    // pas de session = pas connecté => accès refusé
    header("location:test_homepage.php");
    exit;
} else { // utilisateur connecté

    // appel de la fonction verifAdmin
    $autorisation = $_SESSION['utilisateur']['status'];

    if(verifAdmin($autorisation) == false) {
        // l'user n'est pas admin => accès refusé
        header("location:test_homepage.php");
        exit;
    } else {
        // AUTORISATION d'ACCES ACCORDEE
        // appel des requetes de /inc/admin/admin.php
        // /!\ Limiter le php sur la présente page

    }
}

// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");  
?>

    
    <!-- PARTIE DYNAMIQUE DU SITE -->
    <!-- change en fonction de la page chargée -->
    <div class="container">
        <div class="contenu-page">
            <p>Affichage de la page d'administration</p>
        </div>
    </div>



<?php
require("inc/footer.inc.php");

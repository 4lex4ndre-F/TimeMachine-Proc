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
require("inc/nav.inc.php");


 
?>

    
    <!-- PARTIE DYNAMIQUE DU SITE -->
    <!-- change en fonction de la page chargée -->
    <div class="container">
        <div class="contenu-page">
            <h1>Page d'administration</h1>

            <!-- gestion membres -->
            <section>
                <div class="row">
                    <!-- cadre stat globales -->
                    <div class="col-sm-12" id="stats">

                        <pre>$_GET : <?= var_dump($_GET) ?></pre>
                        
                        <h2>Gestion des membres</h2>
                        <p>nombre d'utilisateurs enregistrés : <?= $nbuser ?> dont <?= $nbfemmes ?> femme(s) et <?= $nbhommes ?> homme(s)</p>

                        <!-- bouton gestion users -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gérer les membres
                            </button>
                            <ul class="dropdown-menu"><!-- JAVASCRIPT A FAIRE pour gérer l'affichage et le masquage -->
                                <li><a href="#" id="afficher_membres">Afficher les membres</a></li>
                                <li><a href="#" id="masquer_membres" style="display: none;">Masquer les membres</a></li>
                            </ul>                            
                        </div><!-- fin bouton gestion users -->

                        <!-- A FAIRE -->
                        <!-- rechercher un membre : Champ de recherche sur les indices id, firstname, lastname et pseudo ca ne devrait pas être trop compliqué -->                        
                        <!-- fin recherche membre -->

                        <!-- tableau des membres - affichage dépend de la demande de l'admin (un peu de js c'est bien) -->
                        <table id="table_users" class="table" style="display: none;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nom</th>
                                    <th>prénom</th>
                                    <th>sexe</th>
                                    <th>pseudo</th>
                                    <th>email</th>
                                    <th>mdp</th>
                                    <th>status</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php echo $result_users; // faire en sorte de limiter les résultats à 10/25/50?? ?></td>
                            </tbody>
                        </table>                   
                    </div><!-- fin cadre stats -->
                </div><!-- fin .row -->
            </section><!--fin gestion membres -->

            <!-- gestion photo : voir Philippe -->
            <!-- gestion commentaires -->
            <!-- gestion mots-clés -->






        </div>
    </div>



<?php
require("inc/footer.inc.php");

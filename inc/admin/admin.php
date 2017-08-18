<?php
/*
le dossier admin aurait mieux sa place à la racine serveur plutot qu'ici, va falloir refaire les liens
*/


/*---------------------------------------------------------
                    TABLE USERS

Actions de l'admin à coder :
    voir fiche membre (vue espace membre?)
    changer status ou autres champs comme password
        bonus : envoie de mail de récupération de mot de passe
    suppression membre
---------------------------------------------------------*/


// déclarations variables de sortie
$nbuser = null;
$nbhommes = null;
$nbfemmes = null;
$result_users = "";
// requête de base users
$req_user_base = "SELECT * FROM users";



// déclaration de la variable qui servira à limiter le nombre d'affichage dans les tableausx de gestion
// définir la limte d'affichage + faire des liens afficher les x précédents/suivants (LIMIT x) + modifcation de la requete en fonction du lien cliqué
$limiteAffichage = ""; // du style " LIMIT 25"
$offsetAffichage = ""; // par exemple " OFFSET 25" pour afficher les résultats 26 à 50 suivant l'exemple de la LIMIT à 25
                        // la valeur de l'offset doit changer selon le lien cliqué

// variable qui récupère les paramètres supplémentaires à ajouter à la requete $req_user (ci-dessous)
$limitation_liste = $limiteAffichage . $offsetAffichage; // vide tant que non définie

// nombre d'utilisateur
$req_user = $pdo->query($req_user_base . $limitation_liste);
$nbuser = $req_user->rowCount();

// nombre de femmes
$req_user_femme = $pdo->query($req_user_base . ' WHERE gender = "f"');
$nbfemmes = $req_user_femme->rowCount();

// nombre d'hommes
$req_user_homme = $pdo->query($req_user_base . ' WHERE gender = "m"');
$nbhommes = $req_user_homme->rowCount();


// affichage de tous les users sous forme de tableau

// La vérification liste user
if($nbuser > 0) {    
    //$result_users = "la liste contient des utilsateurs";

    // /!\ ATTENTION AUX TABLEAUX SI IL Y A 2000 LIGNES A AFFICHER - REVOIR LA REQUETE AVEC UN LIMIT + INS2RER LIENs POUR LES RESULTATS SUIVANTS
    // ca va pas être de la tarte ! (bonus)
    while($user = $req_user->fetch(PDO::FETCH_ASSOC))
    {
        $result_users .= '<tr>'; // début de ligne
        foreach ($user as $valeur) {
            $result_users .= '<td>' . $valeur . '</td>';
        }
        // ajout des actions : /!\ FAIRE LES ACTIONS CORRESPONDANTES AUX GET + afficher une description de l'action quand on survole les icones avec la souris
        // voir espace membre
        $result_users .= '<td><a href="?action=voir&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-user"></span></a>';
        // changer status
        $result_users .= '<a href="?action=modification&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-pencil"></span></a>';
        // supprimer membre
        $result_users .= '<a href="?action=supprimer&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-remove"></span></a></td>';


        $result_users .= '</tr>'; // fin de ligne
    }
} else {
    $result_users = "La liste ne contient aucun utilisateur";// fusionner les <td>
}




/*---------------------------------------------------------
                    TABLE PICTURES

partie table photo: Les requetes et les vérifs de Philippe
iront ici.
---------------------------------------------------------*/


/*---------------------------------------------------------
                    TABLE STORIES

---------------------------------------------------------*/


/*---------------------------------------------------------
                    TABLES COMMENT

2 tables à gérer
---------------------------------------------------------*/

/*---------------------------------------------------------
                    TABLES TAGS

2 tables à gérer
J'ai fait de la daube vendredi : 
    à refaire de façon plus propre et fonctionnelle
---------------------------------------------------------*/


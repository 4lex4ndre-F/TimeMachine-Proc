<?php

/*-------------------------------------------- TABLE USER --------------------------------------------*/


// déclarations variables de sortie
$nbuser = null;
$nbhommes = null;
$nbfemmes = null;
$result_users = "";
// requête de base users
$req_user_base = "SELECT * FROM users";

// nombre d'utilisateur
$req_user = $pdo->query($req_user_base);
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

    // /!\ ATTENTION AUX TABLEAUX SI IL Y A 2000 LIGNES A AFFICHER - REVOIR LA REQUETE AVEC UN LIMIT + INS2RER LIEN POUR LES RESULTATS SUIVANTS
    while($user = $req_user->fetch(PDO::FETCH_ASSOC))
    {
        $result_users .= '<tr>'; // début de ligne
        foreach ($user as $valeur) {
            $result_users .= '<td>' . $valeur . '</td>';
        }
        // ajout des actions : /!\ FAIRE LES ACTIONS CORRESPONDANTES AUX GET
        // voir espace membre
        $result_users .= '<td><a href="?action=voir&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-user"></span></a>';
        // changer status
        $result_users .= '<a href="?action=modification&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-pencil"></span></a>';
        // supprimer membre
        $result_users .= '<a href="?action=supprimer&id_user=' . $user['id'] . '" class=""><span class="glyphicon glyphicon-remove"></span></a></td>';


        $result_users .= '</tr>'; // fin de ligne
    }
} else {
    $result_users = "La liste ne contient aucun utilisateur";
}

/* Actions de l'admin à coder :
    voir espace membre
    changer status ou autres champs comme email/password
    suppression membre
*/






// partie table photo (philippe)


// partie table comment pictures + stories


// 
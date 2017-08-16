<?php


// PENSER A IMPLEMENTER LA DECONNEXION
/*if(isset($_GET['action']) && $_GET['action'] =='deconnexion' )
{
	session_destroy();
}*/	


//vérification si l'utilisateur est connecté : 
// 1. le modal de connexion et d'inscription n'apparait pas / disparait
// 2. le bouton de déconnexion apparait
/*if(utilisateur_est_connecte())
{
    $message = 'Vous êtes connecté';
}*/

$pseudo = "";
$password = "";



//Vérification de l'existence des indices du formulaire



if(!empty($_POST['pseudo']) && !empty($_POST['password']))
{
    $message .= '<div class="alert alert-success" role="success" style="margin-top:20px;">POST REMPLI<br /></div>';


    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    // comparaison du post avec la BDD - /!\ réduire les champs de la table users
    $verif_connexion = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
    $verif_connexion->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
    $verif_connexion->bindParam(":password", $password, PDO::PARAM_STR);
    $verif_connexion->execute();

    if($verif_connexion->rowCount() > 0)
    {
        //si nous avons 1 ligne alors le pseudo et le mdp sont corrects
        // valeurs dans session
        $info_utilisateur = $verif_connexion->fetch(PDO::FETCH_ASSOC);
        $_SESSION['utilisateur'] = array();
        $_SESSION['utilisateur']['id'] = $info_utilisateur['id'];
        $_SESSION['utilisateur']['lastname'] = $info_utilisateur['lastname'];
        $_SESSION['utilisateur']['firstname'] = $info_utilisateur['firstname'];
        $_SESSION['utilisateur']['gender'] = $info_utilisateur['gender'];
        $_SESSION['utilisateur']['pseudo'] = $info_utilisateur['pseudo'];
        $_SESSION['utilisateur']['email'] = $info_utilisateur['email'];
        // status ?
        // $_SESSION['utilisateur']['status'] = $info_utilisateur['status'];

        //on redirige sur homepage + message ?
        header("location:test_homepage.php");
    }





}
else
{
    $message .= '<div class="alert alert-success" role="success" style="margin-top:20px;">POST VIDE<br /></div>';
}


?>
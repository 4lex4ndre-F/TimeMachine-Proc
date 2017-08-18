<?php




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



if(!empty($_POST['login']) && !empty($_POST['password']))
{
    //$message .= '<div class="alert alert-success" role="success" style="margin-top:20px;">POST REMPLI<br /></div>';


    $login = $_POST['login'];
    $password = $_POST['password'];
    // comparaison du post avec la BDD
    $req = "SELECT * FROM users WHERE password = :password AND ";
    if(!empty($_POST['login']) && filter_var($_POST['login'], FILTER_VALIDATE_EMAIL))
    {
        $req .= "email = :email";
        $param = ":email";
    }
    elseif (!empty($_POST['login']) && !filter_var($_POST['login'], FILTER_VALIDATE_EMAIL))
    {
        $req .= "pseudo = :pseudo";
        $param = ":pseudo";
    }

    $verif_connexion = $pdo->prepare($req);
    $verif_connexion->bindParam($param, $login, PDO::PARAM_STR);
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
        $_SESSION['utilisateur']['status'] = $info_utilisateur['status'];

        //on redirige sur homepage + message ?
        header("location:test_homepage.php");
    }





}
else
{
    //$message .= '<div class="alert alert-success" role="success" style="margin-top:20px;">POST VIDE<br /></div>';
}


?>
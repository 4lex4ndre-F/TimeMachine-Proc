<?php

// déclaration de cariables vides pour affichage dans les values du formulaire
$lastname="";
$firstname="";
$gender="";
$pseudo="";
$email="";
$password="";
$passwordcheck="";


//variable de contrôle
$erreur = "";
$message = "";
//echo $erreur;

// contrôle sur l'existence de tous les champs provenant du formulaire (sauf le bouton de validation)
if(isset($_POST['lastname']) && 
isset($_POST['firstname']) && 
isset($_POST['gender']) && 
isset($_POST['pseudo']) && 
isset($_POST['email']) && 
isset($_POST['password']) && 
isset($_POST['passwordcheck']))

{

	//le formulaire a été validé, on place dans ces variables, les saisies correspondantes.
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$gender = $_POST['gender'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordcheck = $_POST['passwordcheck'];

	///////////////////////////Contrôle sur le nom///////////////////////////////////////////////
	// contrôle sur la taille du lastname (entre 2 et 50 caractères inclus)
	if (iconv_strlen($lastname)< 2 || iconv_strlen($lastname)>50 )
	{
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du nom est incorrecte.<br />le nom  doit avoir entre 2 et 50  caractères inclus</div>';
		$erreur = true; // si l'on rentre dans cette condition alors il y a une erreur.
	}

	// Vérification des caractères autorisés pour le nom
	$verif_caracteres =preg_match('#^[a-zA-Z._-]+$#',$lastname);

	if(!$verif_caracteres && !empty($lastname))
	{
		$message .='<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, caractères non autorisés dans le nom.<br />Caractères autorisés : A-Z, a-z</div>';
		$erreur = true;
	}
				
	///////////////////////////Contrôle sur le prénom///////////////////////////////////////////////
	// contrôle sur la taille du lastname (entre 2 et 50 caractères inclus)
	if (iconv_strlen($firstname)< 2 || iconv_strlen($firstname)>50 )
	{
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du prénom est incorrecte.<br />le prénom  doit avoir entre 2 et 50  caractères inclus</div>';
		$erreur = true; // si l'on rentre dans cette condition alors il y a une erreur.
	}

	// Vérification des caractères autorisés pour le nom
	$verif_caracteres =preg_match('#^[a-zA-Z._-]+$#',$firstname);

	if(!$verif_caracteres && !empty($firstname))
	{
		$message.='<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, caractères non autorisés dans le prénom.<br />Caractères autorisés : A-Z, a-z</div>';
		$erreur = true;
	}

	////////////////////////////contrôle du Pseudo//////////////////////////////////////////////
	// contrôle sur la taille du pseudo (entre 4 et 14 caractères inclus)

	if (iconv_strlen($pseudo)< 4 || iconv_strlen($pseudo)>14 )
	{
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du pseudo est incorrecte.<br />En effet, le pseudo  doit avoir entre 4 et 14  caractères. inclus</div>';
		$erreur = true; // si l'on rentre dansq cette condition alors il y a une erreur.
	}

	$verif_caracteres = preg_match('#^[a-zA-Z0-9._-]+$#',$pseudo);

	if(!$verif_caracteres && !empty($pseudo))
	{
		$message.='<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, caractères non autorisés dans le nom.<br />Caractères autorisés : A-Z et 0-9, - _ </div>';
		$erreur= true;
	}
	////////////////Vérification de l'email ///////////////////////
	//vérification de la saisie de l'email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email))
	{
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, le format de email est invalide<br />Veuillez vérifier votre saisie</div>';
		$erreur = true;
	}
	
	/////////////// Vérification de la disponibilité de l'email en BDD.
	$verif_email =$pdo->prepare("SELECT * FROM users WHERE email =:email");
	$verif_email->bindParam(":email", $email, PDO::PARAM_STR);
	$verif_email->execute();
	var_dump($verif_email->rowcount());
	if($verif_email->rowcount() > 0)
	{
		//si l'on obtient au moins 1 ligne de résultat alors le pseudo est déjà pris.
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, l\'email n\'est pas disponible<br />Veuillez utiliser un autre email</div>';
		$erreur = true;		
	}
	
	

	/////////////// Vérification de la disponibilité du pseudo en BDD.
	$verif_pseudo =$pdo->prepare("SELECT * FROM users WHERE pseudo =:pseudo");
	$verif_pseudo->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$verif_pseudo->execute();
	var_dump($verif_pseudo->rowcount());
	if($verif_pseudo->rowcount() > 0)
	{
		//si l'on obtient au moins 1 ligne de résultat alors le pseudo est déjà pris.
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, le pseudo n\'est pas disponible<br />Veuillez utiliser un autre email</div>';
		$erreur = true;		
	}
	
	///Vérification du mot de passe
	if($password !=$passwordcheck)
	{
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, le mot de passe de confirmation n\'est pas identique au mot de passe initiale<br />Veuillez vérifier votre mot de passe</div>';
		$erreur = true;		
	}
	
	//////////////////Insertion dans la BDD////////////////////////////
	if($erreur !== true) // si $erreur est différent de true alors les contrôles préalables sont ok !
	{
		//Pour crypter (hachage) le mdp -- Note Alexandre : ce serait bien
		//$password=password_hash($mdp,PASSWORD_DEFAULT); (c'est une possibilité)
			
		$enregistrement =$pdo->prepare("INSERT INTO users (lastname, firstname, gender, pseudo, email, password, status) VALUES (:lastname, :firstname, :gender, :pseudo, :email, :password, 0)");
		$enregistrement->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$enregistrement->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$enregistrement->bindParam(":gender", $gender, PDO::PARAM_STR);
		$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$enregistrement->bindParam(":email", $email, PDO::PARAM_STR);
		$enregistrement->bindParam(":password", $password, PDO::PARAM_STR);
		$enregistrement->execute();
			
		$message='<div class="alert alert-success" role="success" style="margin-top:20px;">L\'enregistrement s\'est effectué<br /></div>';
	}
}


	
<?php 

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// Extraction des variables POST
extract($_POST);

// Test variables POST
if (isset($email) && isset($password)) {

	// Création controlleur
	$utilisateurC = new UtilisateurC();


	// Test si l'utilisateur est présent dans la BDD
	if ($utilisateurC->checkUser($email,$password)) {

		// Récupération du User
		$user = $utilisateurC->getUser($email,$password);

		header("Location: single-annonce.php?id=".$user->id);

	}

}else{

	header("Location: single-annonce.php");
}



 ?>
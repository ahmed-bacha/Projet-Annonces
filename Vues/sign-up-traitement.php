<?php 
// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// affichage du tableau des données
//var_dump($_POST);
extract($_POST);

// traitement des données
$form_ok = true;

$erreur = array(); 

// verification du nom
if(empty($nom)){
	$form_ok = false;
	$erreur[] = "Le champ nom est vide"; 
}

// verification email
if(!UtilisateurC::validateEmail($email)){
	$form_ok = false;
	$erreur[] = " Le champ email est invalide";

}

// verification password
if(!empty($password) && !empty($password_confirme)){

	if(!UtilisateurC::validatePassword($password)){
		$form_ok = false;
		$erreur[] = " Le champ password est invalide";

	}

	if(!UtilisateurC::validatePassword($password_confirme)){
		$form_ok = false;
		$erreur[] = " Le champ password confirmé est invalide";

	}

}else{
	$form_ok = false;
	$erreur[] = " Les champs password et password confirmé sont vides";


}


// verification password identiques
if($password != $password_confirme){
	$form_ok = false;
	$erreur[] = " Le champ password et password confirmé ne sont pas identiques ";

}

if ($form_ok) {


	$userM 	= new UtilisateurM(array(
					'nom' 	=> $nom,
					'mdp' 	=> $password,
					'email' => $email
				));


	$userC 	= new UtilisateurC();

	$exist  = $userC->checkUser($userM->email, $userM->mdp);

	

	if (!$exist) {

		$result = $userC->controlAndSave($userM);
		header("Location: log-in.php");

	}
	else {
		$erreur[] = " l'utilisateur existe dans la base de données";
		header("Location: sign-up.php?err=".json_encode($erreur));
	}
}else {
		header("Location: sign-up.php?err=".json_encode($erreur));
}

 ?>
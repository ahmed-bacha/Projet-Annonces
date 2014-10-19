<?php 
// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// affichage du tableau des données
//var_dump($_POST);
extract($_POST);

// traitement des données
$form_ok = true;

// verification du nom
if(empty($nom)){
	$form_ok = false;
}

// verification email
if(!UtilisateurC::validateEmail($email)){
	$form_ok = false;
}

// verification password
if(!empty($password) && !empty($password_confirme)){

	if(!UtilisateurC::validatePassword($password)){
		$form_ok = false;
	}

	if(!UtilisateurC::validatePassword($password)){
		$form_ok = false;
	}

}else{
	$form_ok = false;
}


// verification password identiques
if($password != $password_confirme){
	$form_ok = false;
}

if ($form_ok) {

	echo "<br> formulaire OK ! <br>";

	$userM 	= new UtilisateurM(array(
					'nom' 	=> $nom,
					'mdp' 	=> $password,
					'email' => $email
				));

	var_dump($userM);

	$userC 	= new UtilisateurC();

	$exist  = $userC->checkUser($userM->email, $userM->mdp);

	echo "<br> exist : ";
	var_dump($exist);
	echo "<br>";

	if (!$exist) {

		$result = $userC->controlAndSave($userM);

		echo "<br> result : ";
		var_dump($result);
		echo "<br>";
	}
}

 ?>
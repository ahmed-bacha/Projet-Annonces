<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

//var_dump($_POST);
// Extraction des variables POST
extract($_POST);


$erreur = array();



// Test variables POST
if (UtilisateurC::validateEmail($email) && UtilisateurC::validatePassword($password)) {

  // Création controlleur
  $utilisateurC = new UtilisateurC();

  // Test si l'utilisateur est présent dans la BDD
  if ($utilisateurC->checkUser($email,$password)) {

    //demarrage de la session
    session_start();

    // Récupération du User
    $utilisateurM = $utilisateurC->getUser($email,$password);

    // On  crée les variables de session dans $_SESSION
    $_SESSION['utilisateurM']    = $utilisateurM;

    header("Location: single-annonce.php");

  }
  else{

    $erreur[] = "Email ou mot de passe incorrects";
    header("Location: log-in.php?err=".json_encode($erreur));
  }

}else{

  $erreur[] = "Email ou mot de passe incorrects";
  header("Location: log-in.php?err=".json_encode($erreur));

}


?>

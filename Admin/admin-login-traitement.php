<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// Extraction des variables POST
extract($_POST);


$erreur = array();

// Test variables POST
if (isset($user) && !empty($user) && $user == "admin" &&
    isset($password) && !empty($password) && $password == "admin") {

    session_start();

    $_SESSION['Admin']    = true;

    header("Location: dashboard.php");

}else{

  $erreur[] = "Utilisateur ou mot de passe incorrects";
  show($erreur);
}


?>

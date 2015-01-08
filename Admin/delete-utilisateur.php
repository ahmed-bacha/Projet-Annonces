<?php
// On inclue toutes les classes du projet
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['Admin'])){
  $adminM = $_SESSION['Admin'];
}else{
  header("location: index.php");
}

// On extrait idUtilisateur
extract($_GET);

$o_utilisateurC = new UtilisateurC();

$o_utilisateurM = $o_utilisateurC->getUserById($idUtilisateur);

$o_utilisateurC->deleteUser($o_utilisateurM);

echo true;

?>

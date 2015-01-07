<?php
// Chargement des classes nécessaires
require_once("../Utils/includeAll.php");

session_start();

// Extraction de l'id de l'anonce
extract($_GET);

$_id = $idAdmin;

if(isset($_SESSION['Admin'])){
  $adminM = $_SESSION['Admin'];
}else{
  header("location: index.php");
}

if(!AdminC::isAdministrateur($adminM->login, $adminM->mdp)){
  header("location: index.php");
}else{
$adminC = new AdminC();

$adminM  = $adminC->getAdminById($_id);

$adminC->deleteAdmin($adminM);

echo true;
}
?>

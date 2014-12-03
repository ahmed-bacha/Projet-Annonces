<?php

  // Afficher les erreurs à l'écran
  ini_set('display_errors', 1);

  // Afficher les erreurs et les avertissements
  error_reporting(E_ALL);

  // Chargement des classes nécessaires
  require_once("../Utils/includeAll.php");

  session_start();

  // Extraction de l'id de l'anonce
  extract($_GET);

  $_id = $idAnnonce;

  // Donnees de session
  if(isset($_SESSION['utilisateurM'])){

    $o_userM = $_SESSION['utilisateurM'];

  }

  // Suppression de l'annonce
  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($_id);

  if($o_annonceM->idUtilisateur == $o_userM->id){

    $o_annonceC->deleteAnnonce($o_annonceM);

    echo true;

  }

  echo false;

?>

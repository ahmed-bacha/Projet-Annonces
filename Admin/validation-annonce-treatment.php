<?php


  require_once("../Utils/includeAll.php");

  extract($_GET);

  $_validation = boolval($_validation);

  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($_idAnnonce);

  if($_validation === true){

    $o_annonceM->statut = TRAITE;

  } else {

    $o_annonceM->statut = A_SUPPRIMER;

  }

  $_response = $o_annonceC->updateAnnonce($o_annonceM);

  echo $_response;

?>

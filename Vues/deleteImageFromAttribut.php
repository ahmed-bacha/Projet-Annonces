<?php

  //---------------------------------------
  // get all project classes
  //---------------------------------------

  require_once("../Utils/includeAll.php");

  //---------------------------------------
  // session begining
  //---------------------------------------

  session_start();

  $o_utilisateurM = null;

  if(isset($_SESSION['utilisateurM'])){

    $o_utilisateurM = $_SESSION['utilisateurM'];

  }

  //---------------------------------------
  // know all about the post
  //---------------------------------------

  extract($_POST);

  //---------------------------------------
  // get the current announce
  //---------------------------------------

  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($id);

  $_arrayImages = explode ( ';' , $o_annonceM->images );

  //---------------------------------------
  // update the array if image
  //---------------------------------------

  if(in_array($nom, $_arrayImages)){

    $_key = array_search($nom, $_arrayImages);

    unset($_arrayImages[$key]);

    unlink('images/'.$nom);

    $_stringImages = implode(';' , $_arrayImages);

    $o_annonceM->images  = $_stringImages;

    $o_annonceC->updateAnnonce($o_annonceM);

    echo "ok";

  } else {

    echo "pas de traitement";

  }

?>

<?php

  //-------------------------
  // session
  //-------------------------

  session_start();

  //-------------------------
  // all classes loading
  //-------------------------

  require_once("../Utils/includeAll.php");

  //-------------------------
  // controller declaration to treat image
  //-------------------------

  $o_annonceC = new AnnonceC();

  //-------------------------
  // $_GET extraction
  //-------------------------

  extract($_GET);

  //-------------------------
  // treatment
  //-------------------------

  if($_distance == 'merger'){

    $_SESSION['currentIndex'] -= 1;

  }

  if($_distance == 'far'){

    $_SESSION['currentIndex'] += 1;

  }

  $_arrayObj = array();

  $_maxPage = AnnonceM::returnPageNumber();

  $liste_annonces = AnnonceM::getFollowingAnnonces($_SESSION['currentIndex']);

  foreach($liste_annonces as $o_annonceM){

    $_annonceImage = null;

    $_imageArray = $o_annonceC->deconcatImages($o_annonceM);

    if(!empty($_imageArray)){

      if(is_array($_imageArray)){

        foreach ($_imageArray as $_value){

          if(!empty($_value)){

            $_annonceImage = 'images/'.$_value;

            break;

          }

        }

      }

      if(is_string($_imageArray)){

        $_annonceImage = 'images/'.$_imageArray;

      }

    } else {

      $_annonceImage = 'resources-img/noImage.jpg';

    }

    $o_annonceM->images = $_annonceImage;

    array_push($_arrayObj, $o_annonceM->toArray());

  }

  echo json_encode( [ $_SESSION['currentIndex'] , $_arrayObj , $_maxPage ] );

?>

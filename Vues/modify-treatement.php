<?php

  //======================================================
  // treatement to update an exiting announce
  //======================================================

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
  // script to see php errors
  //---------------------------------------

  // error_reporting(E_ALL);
  //
  // ini_set('display_errors','On');

  //---------------------------------------
  // know all about the post
  //---------------------------------------

  extract($_POST);

  //---------------------------------------
  // get the current announce
  //---------------------------------------

  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($annonceId);

  //======================================================
  // $_POST treatment
  //======================================================

  $o_annonceM->nom          = $nom;

  $o_annonceM->prenom       = $prenom;

  $o_annonceM->telephone    = $telephone;

  $o_annonceM->titre        = $titre;

  $o_annonceM->prix         = $prix;

  $o_annonceM->description  = $description;

  //---------------------------------------
  // global variable declaration
  //---------------------------------------

  $_arrayOldImages = $o_annonceC->deConcatImagesNames($o_annonceM);

  if (sizeOf($_arrayOldImages) < 3) {

    while (sizeOf($_arrayOldImages) < 3) {

      array_push($_arrayOldImages, null);

    }

  }

  //======================================================
  // data array building
  //======================================================

  //---------------------------------------
  // add new image
  //---------------------------------------

  $_data = array();

  for($i = 0 ; $i < 3 ; $i++){

    $_file = getFileById($i);

    array_push($_data, $_file);

  }

  //---------------------------------------
  // add old image
  //---------------------------------------

  // show($_arrayOldImages);

  for($i = 0 ; $i < 3 ; $i++){

    $_file = getFileByName($_arrayOldImages[$i]);

    array_push($_data, $_file);

  }

  //======================================================
  // treatment
  //======================================================

  //---------------------------------------
  // final key treatment
  //---------------------------------------

  $_newData = array();

  $_oldData = array();

  // $_newData filling
  foreach ($_data as $_value){

    if($_value['state'] == 'new'){

      array_push($_newData, $_value);

    }

  }

  // $_oldData filling
  foreach ($_data as $_value){

    if($_value['state'] == 'old'){

      array_push($_oldData, $_value);

    }

  }

  // final key treatment
  for($i = 0 ; $i < 3 ; $i++){

    if(!is_null($_newData[$i]['extention'])){

      $_newData[$i]['final'] = true;

    } else {

      if(!is_null($_oldData[$i]['extention'])){

        $_oldData[$i]['final'] = true;

      }

    }

  }

  $_data = array();

  $_data = array_merge($_newData, $_oldData);

  //---------------------------------------
  // toLoad key treatment
  //---------------------------------------

  $_newData = array();

  $_oldData = array();

  // $_newData filling
  foreach ($_data as $_value){

    if($_value['state'] == 'new'){

      array_push($_newData, $_value);

    }

  }

  // $_oldData filling
  foreach ($_data as $_value){

    if($_value['state'] == 'old'){

      array_push($_oldData, $_value);

    }

  }

  $_finalNewData = array();

  // toLoad treatment
  foreach ($_newData as $_newValue){

    if(!is_null($_newValue['extention'])){

      $_toLoad = false;

      foreach ($_oldData as $_oldValue){

        if(!is_null($_newValue['extention'])){

          if(($_oldValue['md5'] != $_newValue['md5']) && ($_toLoad == false)){

            $_newValue['toLoad'] = $_toLoad = true;

            array_push($_finalNewData, $_newValue);

          }

        } else {

          array_push($_finalNewData, $_newValue);

        }

      }

    } else {

      array_push($_finalNewData, $_newValue);

    }

  }

  $_data = array();

  $_data = array_merge($_finalNewData, $_oldData);

  //---------------------------------------
  // toDelete key treatment
  //---------------------------------------

  $_images = array();

  $_oldData = array();

  // $_images filling
  foreach ($_data as $_value){

    if($_value['final'] == true){

      array_push($_images, $_value);

    }

  }

  // $_oldData filling
  foreach ($_data as $_value){

    if($_value['state'] == 'old'){

      array_push($_oldData, $_value);

    }

  }

  $_finalOldData = array();

  // toDelete treatment
  foreach ($_oldData as $_oldValue){

    if(!is_null($_oldValue['extention'])){

      foreach ($_images as $_imagesValue) {

        if($_imagesValue['md5'] != $_oldValue['md5']){

          if($_oldValue['final'] == false){

            $_oldValue['toDelete'] = true;

          }

        }

      }

      array_push($_finalOldData, $_oldValue);

    } else {

      array_push($_finalOldData, $_oldValue);

    }

  }

  $_data = array();

  $_data = array_merge($_finalNewData, $_finalOldData);

  //---------------------------------------
  // final treatment
  //---------------------------------------

  $_attribut = array();

  foreach ($_data as $_value) {

    if(!is_null($_value['extention'])){

      if($_value['final'] == true){

        if($_value['state'] == 'new'){

          $_value['name'] = "image".$o_utilisateurM->id.'-'.rand(0,9999999).'.'. $_value['extention'];

          if($_value['toLoad'] == true){

            upLoadFile($_value);

          }

          array_push($_attribut, $_value['name']);

        }

        if($_value['state'] == 'old'){

          array_push($_attribut, $_value['name']);

        }

      }

      if($_value['final'] == false){

        if($_value['toDelete'] == true){

          deleteFile($_value);

        }

      }

    }

  }

  //---------------------------------------
  // show result
  //---------------------------------------

  $o_annonceM->images  = implode(';', $_attribut);

  $o_annonceC->updateAnnonce($o_annonceM);

  echo 'correctly updated !';

  //---------------------------------------
  // function to get a $_file by $_index
  //---------------------------------------

  function getFileById($_index){

    $_file = array();

    if(!empty($_FILES['image']['tmp_name'][$_index])){

      $_file['name']      = $_FILES['image']['name'][$_index];

      $_file['extention'] = getExtension($_file['name']);

      $_file['path']      = $_FILES['image']['tmp_name'][$_index];

      $_file['size']      = $_FILES['image']['size'][$_index];

      $_file['md5']       = md5ForFile($_file['path']);


    } else {

      $_file['name']      = null;

      $_file['extention'] = null;

      $_file['path']      = null;

      $_file['size']      = null;

      $_file['md5']       = null;

    }

    $_file['state']     = 'new';

    $_file['toLoad']    = false;

    $_file['toDelete']  = false;

    $_file['final']     = false;

    return $_file;

  }

  //---------------------------------------
  // function to get a $_file by $_filename
  //---------------------------------------

  function getFileByName($_filename){

    $_file = array();

    if(!is_null($_filename)){

      $_file['name']      = $_filename;

      $_file['extention'] = getExtension($_filename);

      $_file['path']      = 'images/'.$_filename;

      $_file['size']      = filesize($_file['path']);

      $_file['md5']       = md5ForFile('images/'.$_filename);

    } else {

      $_file['name']      = null;

      $_file['extention'] = null;

      $_file['path']      = null;

      $_file['size']      = 0;

      $_file['md5']       = null;

    }

    $_file['state']     = 'old';

    $_file['toLoad']    = false;

    $_file['toDelete']  = false;

    $_file['final']     = false;

    return $_file;

  }

  //---------------------------------------
  // function to delete
  //---------------------------------------

  function deleteFile($_file){

    unlink('images/'.$_file['name']);

  }

  //---------------------------------------
  // function to upload a file on server
  //---------------------------------------

  function upLoadFile($_file){

    $maxsize = 5048576;

    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');

    $_error = null;

    if (!empty($_file['name'])) {

      if ($_file['size'] < $maxsize) {

        $extension_upload = $_file['extention'];

        if (in_array($extension_upload,$extensions_valides)){

          $resultat = move_uploaded_file($_file['path'] , "../Vues/images/".$_file['name']);

        } else {

          $_error = "Extension incorrecte";

        }

      } else {

        $_error = "Le fichier est trop gros";

      }

    }

  }

  // header("Location: liste-mes-annonces.php");

?>

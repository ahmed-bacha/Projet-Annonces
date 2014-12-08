<?php

  //======================================================
  // treatement to update an exiting advertisement
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

  error_reporting(E_ALL);

  ini_set('display_errors','On');

  //---------------------------------------
  // know all about the post
  //---------------------------------------

  // echo '<pre>';
  //
  // print_r($_POST);
  //
  // echo '</pre>';

  extract($_POST);

  // echo $annonceId;

  //---------------------------------------
  // get the current user and ad
  //---------------------------------------

  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($annonceId);

  // echo '<pre>';
  //
  // print_r($o_annonceM);
  //
  // echo '</pre>';

  //---------------------------------------
  // know md5 signature of images contained in the current ad
  //---------------------------------------

  // echo $o_annonceM->images.'<br />';

  $_arrayImages = $o_annonceC->deConcatImagesNames($o_annonceM);

  // echo '<pre>';
  //
  // print_r($_arrayImages);
  //
  // echo '</pre>';

  // echo 'md5 signatures of images already contained in /images : <br /><br />';

  for($i = 0 ; $i < sizeOf($_arrayImages) ; $i++){

    $md5_file = md5_file('images/'.$_arrayImages[$i]);

    // echo 'md5 file signature : '.$md5_file.'<br />';

  }

  // echo '<br />';

  //---------------------------------------
  // know md5 signature of new images
  //---------------------------------------

  // echo 'md5 signatures of images that will be contained in images if they are different : <br /><br />';

  for($i = 0 ; $i < sizeOf($_FILES['image']['name']) ; $i++){

    if(!empty($_FILES['image']['name'][$i])){

      $md5_file = md5_file($_FILES['image']['tmp_name'][$i]);

      // echo 'md5 file signature : '.$md5_file.'<br />';

    }

  }

  //---------------------------------------
  // treatement of images that we have to keep in images attribut
  //---------------------------------------

  $_result = array();

  $_newImagesAttribut = array();

  for($i = 0 ; $i < sizeOf($_FILES['image']['name']) ; $i++){

    $_imageState = array(
                          'name'          => $_FILES['image']['name'][$i],
                          'extention'     => $_FILES['image']['type'][$i],
                          'way'           => $_FILES['image']['tmp_name'][$i],
                          'existOnServer' => 0,
                          'round'         => 0
                        );

    /**
    * existOnServer :: 0 :: does not exist on server
    * existOnServer :: 1 :: exists on server but informations must be changed
    * existOnServer :: 2 :: exists on server and informations has been already changed
    */

    if(!empty($_imageState['extention'])){

      // md5 signature evaluation
      $_md5NewFileSignature = md5_file($_imageState['way']);

      for($j = 0 ; $j < sizeOf($_arrayImages) ; $j++){

        if(!empty($_arrayImages[$j])){

          // md5 signature evaluation
          $_md5OldFileSignature = md5_file('images/'.$_arrayImages[$j]);

          if($_md5OldFileSignature == $_md5NewFileSignature){

            $_imageState['existOnServer'] = 1;

            $_imageState['round'] = $j;

          } else {

            // echo 'the two images does not correspond anyway<br />';

          }

        } else {

          // echo 'the old image is empty.<br />';

        }

      }

    } else {

      // echo 'the new image is empty.<br />';

      if(!empty($_arrayImages[$i])){

        // echo 'In revanche, the old image is not empty !<br />';

        // image name
        $_imageState['name'] = $_arrayImages[$i];

        // image extension
        $_ext = explode('.', $_imageState['name']);

        $_imageState['extention'] = $_ext[1];

        // image way
        $_imageState['way'] = 'images/'.$_imageState['name'];

        // image existence
        $_imageState['existOnServer'] = 2;

      } else {

        // echo 'The two images are empty ! <br />';

      }

    }

    if($_imageState['existOnServer'] == 1){

      // image name
      $_imageState['name'] = $_arrayImages[$_imageState['round']];

      // image extention
      $_ext = explode('.', $_imageState['name']);

      $_imageState['extention'] = $_ext[1];

      //image way
      $_imageState['way'] = 'images/'.$_imageState['name'];

    }

    if($_imageState['existOnServer'] == 0) {

      // image to upload
      $_image = array();

      // get the image index in $_FILES according its name
      $_arrayIndex = array_keys($_FILES['image']['name'], $_imageState['name']);

      // index in $_FILES of the image to upload
      $_index = $_arrayIndex[0];

      $_keys = array_keys($_FILES['image']);

      foreach ($_keys as $_value) {

        $_image[$_value] = $_FILES['image'][$_value][$_index];

      }

      $_idUser = $o_utilisateurM->id;

      $_image['name'] = modifyFileName($_image, $_idUser);

      upLoadFile($_image);

      $_imageState['name'] = $_image['name'];

    }

    array_push($_result, $_imageState);

  }

  //---------------------------------------
  // result display
  //---------------------------------------

  // for($i = 0 ; $i < sizeOf($_result) ; $i++){
  //
  //   echo '<pre>';
  //
  //   print_r($_result[$i]);
  //
  //   echo '</pre>';
  //
  // }

  //---------------------------------------
  // build the new images attributs
  //---------------------------------------

  for($i = 0 ; $i < sizeOf($_result) ; $i++){

    array_push($_newImagesAttribut, $_result[$i]['name']);

  }

  $_arrayObsoleteImages   = array();

  $_arrayMd5OldImage      = array();

  $_arrayMd5NewImage      = array();

  $_allKeys               = array(0, 1, 2);

  for($i = 0 ; $i < 3 ; $i++){

    if(file_exists('images/'.$_arrayImages[$i])){

      $_md5OldCurrentImage = md5_file('images/'.$_arrayImages[$i]);

      array_push($_arrayMd5OldImage, $_md5OldCurrentImage);

    }

    if(file_exists('images/'.$_newImagesAttribut[$i])){

      $_md5NewCurrentImage = md5_file('images/'.$_newImagesAttribut[$i]);

      array_push($_arrayMd5NewImage, $_md5NewCurrentImage);

    }

  }

  for($i = 0 ; $i < 3 ; $i++){

    $_key  = array_search($_arrayMd5OldImage[$i], $_arrayMd5NewImage);

    unset($_allKeys[$_key]);

  }

  foreach($_allKeys as $_value){

    unlink('images/'.$_arrayImages[$_value]);

  }

  // echo '<pre>';
  //
  // print_r($_arrayMd5NewImage);
  //
  // print_r($_arrayMd5OldImage);
  //
  // print_r($_allKeys);
  //
  // echo '</pre>';

  // echo 'new images attributs : <br />';
  //
  // echo '<pre>';
  //
  // print_r($_newImagesAttribut);
  //
  // echo '</pre>';

  $o_annonceM->images = implode(";", $_newImagesAttribut);

  $o_annonceC->updateAnnonce($o_annonceM);

  //---------------------------------------
  // function to upload a file on server
  //---------------------------------------

  function upLoadFile($_file){

    $maxsize = 5048576;

    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');

    $_error = null;

    if (!empty($_file['name'])) {

      if ($_file['error'] == 0) {

        if ($_file['size'] < $maxsize) {

          $extension_upload = strtolower(substr(strrchr($_file['name'],'.'), 1));

          if ( in_array($extension_upload,$extensions_valides) ){

            // $image_names[$i] = "image". $userM->id ."-".rand(0,9999999).".". $extension_upload;

            $resultat = move_uploaded_file($_file['tmp_name'] , "../Vues/images/".$_file['name']);

          } else{

            $_error = "Extension incorrecte";
          }

        }else{

          $_error = "Le fichier est trop gros";
        }

      }else{

        $_error = "Erreur lors du transfert";

      }

    }

    // echo $_error.'<br />';
    //
    // echo 'the file '.$_file['name'].' had been uploaded ! <br />';

  }

  //---------------------------------------
  // function to modify name of the file
  //---------------------------------------

  function modifyFileName($_file, $_idUser){

    $_fileName = $_file['name'];

    $_fileArray = explode('.', $_fileName);

    $_fileName = 'image'.$_idUser.'-'.rand(0,9999999).'.'.$_fileArray[1];

    return $_fileName;

  }

  header("Location: liste-mes-annonces.php");

?>

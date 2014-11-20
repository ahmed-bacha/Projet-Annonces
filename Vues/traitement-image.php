<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

$maxsize = 5048576;
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$erreur = array();

//var_dump( $_FILES);    //Le nom original du fichier, comme sur le disque du visiteur (ex


if ($_FILES['icone']['error'] == 0) {

  if ($_FILES['icone']['size'] < $maxsize) {

    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );

    if ( in_array($extension_upload,$extensions_valides) ){

      $resultat = move_uploaded_file($_FILES['icone']['tmp_name'] , "../Vues/images/image".rand(0,9999999)."-".rand(0,9999999).".". $extension_upload);

      if ($resultat) {
        echo "Transfert réussi";
      }

    } else{
      $erreur = "Extension correcte";
    }

  }else{
    $erreur = "Le fichier est trop gros";
  }

}else{
  $erreur = "Erreur lors du transfert";
}




?>

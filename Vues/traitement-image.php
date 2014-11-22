<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

$maxsize = 995048576;
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$erreur = array();

print_r($_FILES['image']);
//echo "<br>";

//var_dump(sizeof($_FILES['image']['name']);

for ($i=0; $i < sizeof($_FILES['image']['name']); $i++) {

  if (!empty($_FILES['image']['name']["$i"])) {
    echo "salut";
    if ($_FILES['image']['error']["$i"] == 0) {


      if ($_FILES['image']['size']["$i"] < $maxsize) {

        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name']["$i"], '.')  ,1)  );

        if ( in_array($extension_upload,$extensions_valides) ){
          //echo "salut";
          $resultat = move_uploaded_file($_FILES['image']['tmp_name']["$i"] , "../Vues/images/image".rand(0,9999999)."-".rand(0,9999999).".". $extension_upload);

          if ($resultat) {

            echo "Transfert réussi";
          }

        } else{

          $erreur = "Extension incorrecte";
        }

      }else{

        $erreur = "Le fichier est trop gros";
      }

    }else{

      $erreur = "Erreur lors du transfert";
    }

  }

}


?>

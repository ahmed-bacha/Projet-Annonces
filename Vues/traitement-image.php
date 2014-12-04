<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();

$maxsize = 5048576;
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$erreur = array();
$image_names = array();


extract($_POST);

$form_ok = true;


if(isset($_SESSION['utilisateurM'])){

  $userM = $_SESSION['utilisateurM'];


  // verification du nom
  if(empty($nom)){

    $form_ok = false;
    $erreur[] = "Le champ nom est vide";
  }

  // verification du prenom
  if(empty($prenom)){

    $form_ok = false;
    $erreur[] = "Le champ prenom est vide";
  }

  // verification du telephone
  if(empty($telephone) || AnnonceC::verifTelFr($telephone) == false){

    $form_ok = false;
    $erreur[] = "Champ telephone non valide";
  }

  // verification du titre
  if(empty($titre)){

    $form_ok = false;
    $erreur[] = "Le champ titre est vide";
  }

  // verification du prix
  if(empty($prix)){

    $form_ok = false;
    $erreur[] = "Le champ prix est vide";
  }

  // verification du description
  if(empty($description)){

    $form_ok = false;
    $erreur[] = "Le champ description est vide";
  }


  if ($form_ok) {

    for ($i=0; $i < sizeof($_FILES['image']['name']); $i++) {

      if (!empty($_FILES['image']['name']["$i"])) {
        //echo "salut";
        if ($_FILES['image']['error']["$i"] == 0) {


          if ($_FILES['image']['size']["$i"] < $maxsize) {

            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name']["$i"], '.')  ,1)  );

            if ( in_array($extension_upload,$extensions_valides) ){
              //echo "salut";
              $image_names[$i] = "image". $userM->id ."-".rand(0,9999999).".". $extension_upload;
              $resultat = move_uploaded_file($_FILES['image']['tmp_name']["$i"] , "../Vues/images/".$image_names[$i]);

              // $result = json_encode($image_names);

              // echo $result;

              if ($resultat) {

                //echo "Transfert réussi";
              }

            } else{

              $erreur[] = "Extension incorrecte";
            }

          }else{

            $erreur[] = "Le fichier est trop gros";
          }

        }else{

          $erreur[] = "Erreur lors du transfert";
        }

      }

    }

    $annonceC = new AnnonceC();

    $annonceM = new AnnonceM(
                          array(
                                  'idUtilisateur' => $userM->id,
                                  'nom' 	        => $nom,
                                  'prenom'      	=> $prenom,
                                  'telephone'     => $telephone,
                                  'titre'       	=> $titre,
                                  'prix'        	=> $prix,
                                  'description'   => $description,
                                  'images'        => $annonceC->concatImagesNames($image_names)
                                ));


    $annonceC->addAnnonce($annonceM);

  }



}else{

  $form_ok = false;
  $erreur[] = "Utilisateur non connecté";
}


for ($i=0; $i < sizeof($erreur); $i++) {
  echo $erreur["$i"]."<br>";
}




?>

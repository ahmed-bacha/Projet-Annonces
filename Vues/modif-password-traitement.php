<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();

// on extrait les données du tableau POST
extract($_POST);

if(isset($_SESSION['utilisateurM'])){

  $userM = $_SESSION['utilisateurM'];

  if($new_pass === $confirm_new_pass){

    if(UtilisateurC::validatePassword($new_pass) && UtilisateurC::validatePassword($confirm_new_pass)){

      if($userM->mdp === $current_pass){

        echo 'Modification permise';

        // TO-DO

      }else{

        echo 'Le mot de passe courrant est incorrect';

      }

    }else{
      echo "Le nouveau mot de passe est invalide";
    }

  }else{
    echo "Les mots de pass ne sont pas identiques";
  }

}


 ?>

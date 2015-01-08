<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();

// on extrait les données du tableau POST
extract($_POST);

$form_ok = true;

$erreur = array();

if(isset($_SESSION['utilisateurM'])){

  $userM = $_SESSION['utilisateurM'];
  $userC = new UtilisateurC ();


 if($userM->mdp === $current_pass){

      if($new_pass === $confirm_new_pass){

           if(UtilisateurC::validatePassword($new_pass) && UtilisateurC::validatePassword($confirm_new_pass)){

  
                echo 'Modification permise';
                $userM->mdp = $new_pass;
                $userC->updateUser($userM);
                show($userM);

                header("Location: liste-annonces.php");

      }else{
       $form_ok = false;
       $erreur[] =  "Le nouveau mot de passe est invalide";
      }

    }else{
      $form_ok = false;
      $erreur[] =  "Les mots de pass ne sont pas identiques";
    }

  }else{
   $form_ok = false;
   $erreur[] = "Le mot de passe courrant est incorrect";
   
  }

if(!$form_ok){
  header("Location: modif-password.php?err=".json_encode($erreur));
}


}


 ?>

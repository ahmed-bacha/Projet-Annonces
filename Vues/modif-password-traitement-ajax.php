<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();

// on extrait les données du tableau POST
extract($_POST);


$erreur = array();

if(isset($_SESSION['utilisateurM'])){

  $userM = $_SESSION['utilisateurM'];
  $userC = new UtilisateurC ();


 if($userM->mdp === $current_pass){

      if($new_pass === $confirm_new_pass){

           if(UtilisateurC::validatePassword($new_pass) && UtilisateurC::validatePassword($confirm_new_pass)){

                $userM->mdp = $new_pass;
                $userC->updateUser($userM);
                        

      }else{
      
       $erreur[] =  "Le nouveau mot de passe est invalide";
      
      }

    }else{
      
      $erreur[] =  "Les mots de pass ne sont pas identiques";
     
    }

  }else{
  
   $erreur[] = "Le mot de passe courrant est incorrect";
  
   
  }

}

for ($i=0; $i < sizeof($erreur); $i++) {
  echo $erreur["$i"]."<br>";
}

 ?>

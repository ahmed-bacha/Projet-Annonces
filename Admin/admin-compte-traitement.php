<?php
// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");
// On démarre la session
session_start();

if(isset($_SESSION['Admin'])){
  $adminM = $_SESSION['Admin'];
}else{
  header("location: index.php");
}

$adminC = new AdminC();

// Extraction des variables POST
extract($_POST);

$erreur = array();



// Test variables POST
if (isset($ancienMdp) && !empty($ancienMdp) &&
isset($password1) && !empty($password1) &&
isset($password2) && !empty($password2)) {

  if($ancienMdp == $adminM->mdp){
    if($password1 == $password2){

      $adminM->mdp = $password1;
      $adminC->updateAdmin($adminM);

    }else{
      $erreur[] = "Nouveaux mots de passe différents";
    }

  }else{
    $erreur[] = "Mauvais ancien mot de passe";
  }


}else{

  $erreur[] = "Un des champs est vide";
}




for ($i=0; $i < sizeof($erreur); $i++) {
  echo $erreur["$i"]."<br>";
}

?>

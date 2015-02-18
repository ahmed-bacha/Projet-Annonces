<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");
// On démarre la session

$adminC = new AdminC();


$adminC->testAdministrateurExist();

// Extraction des variables POST
extract($_POST);


$erreur = array();



// Test variables POST
if (isset($user) && !empty($user) &&
    isset($password) && !empty($password) ) {

      if($adminC->checkAdmin($user,$password)){

        $adminM = $adminC->getAdmin($user,$password);

        session_start();

        $_SESSION['Admin'] = $adminM;


      }else{

        $erreur[] = "Login ou mot de passe incorrects";
      }


}else{

  $erreur[] = "Login ou mot de passe incorrects";
}
if($erreur){
  for ($i=0; $i < sizeof($erreur); $i++) {
    echo $erreur["$i"]."<br>";
  }
}
?>

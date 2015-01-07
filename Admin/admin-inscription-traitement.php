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
  if(!AdminC::isAdministrateur($adminM->login, $adminM->mdp)){
    header("location: dashboard.php");
  }
  
  $adminC = new AdminC();

  // Extraction des variables POST
  extract($_POST);


  $erreur = array();



  // Test variables POST
  if (isset($login) && !empty($login) &&
  isset($password1) && !empty($password1) &&
  isset($password2) && !empty($password2)) {


    if($password1 == $password2){

      if($adminC->checkAdmin($login,$password1) == false){

        $donnees = array(
          'login' 	=> $login,
          'mdp' 	  => $password1);
          $admin = new AdminM($donnees);

        $adminC->controlAndSave($admin);

      }else{
        $erreur[] = "Admin existant";
      }
    }else{
      $erreur[] = "Mots de passe différents";
    }



  }else{

    $erreur[] = "Login ou mot de passe vide";
  }




  for ($i=0; $i < sizeof($erreur); $i++) {
    echo $erreur["$i"]."<br>";
  }

  ?>

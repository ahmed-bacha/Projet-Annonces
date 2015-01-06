<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");

// Extraction des variables POST
extract($_POST);


$erreur = array();

$adminC = new AdminC();

// Test variables POST
if (isset($user) && !empty($user) &&
    isset($password) && !empty($password) ) {

      if($adminC->checkAdmin($user,$password)){

        $adminM = $adminC->getAdmin($user,$password);

        session_start();

        $_SESSION['Admin'] = $adminM;

        ?>

        <script charset="utf-8">
        document.location.href = '/Projet-annonces/Admin/dashboard.php';
        </script>

        <?php

      }else{

        $erreur[] = "Login ou mot de passe incorrects";
      }


}else{

  $erreur[] = "Login ou mot de passe incorrects";
}

for ($i=0; $i < sizeof($erreur); $i++) {
  echo $erreur["$i"]."<br>";
}

?>
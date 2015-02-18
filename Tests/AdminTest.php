<?php

require_once("../Utils/includeAll.php");


$donnees = array(
  'login' 	=> 'loginAdmin',
  'mdp' 	  => 'mdpAdmin');


  /*-- Création model -------------------*/
  $o_AdminM = new AdminM($donnees);

  $adminC = new AdminC();

  /*-- Test accesseur -------------------*/
  echo 'login de l\'admin : '.$o_AdminM->login.'<br />';
  echo 'mot de passe de l\'admin : '.$o_AdminM->mdp.'<br />';
  echo '<br />';

  var_dump($adminC->controlAndSave($o_AdminM));


  /*-- Test mutateur --------------------*/
  $o_AdminM->login 	= 'other-login-admin';
  $o_AdminM->mdp 	= 'other-mdp-admin';

  echo 'login de l\'admin : '.$o_AdminM->login.'<br />';
  echo 'mot de passe de l\'admin : '.$o_AdminM->mdp.'<br />';

  echo '<br />';



  var_dump($adminC->controlAndSave($o_AdminM));


  echo '<br />';
  echo 'check admin: ';
  var_dump($adminC->checkAdmin("loginAdmin","mdpAdmi"));

  echo '<br />';

  $admin = $adminC->getAdmin("loginAdmin","mdpAdmin");
  var_dump($admin);

  echo '<br />';

  var_dump($adminC->deleteAdmin($admin));


  ?>

<?php

// inclure les controlleurs et les modeles
require_once("../Utils/includeAll.php");


// Extraction des variables POST
extract($_POST);

$info =  array();

if(isset($ajax) && $ajax == true){

  if(UtilisateurC::validateEmail($email) && isset($nom) && !empty($nom) && isset($message) && !empty($message) && isset($idAnnonce) && !empty($idAnnonce) ){


    $o_annonceC       = new AnnonceC();

    $o_annonceM       = $o_annonceC->getAnnonceById($idAnnonce);

    $o_utilisateurC   = new UtilisateurC();

    $o_utilisateurM   = $o_utilisateurC->getUserById();

    $_paramMail       = array(
                               'to'        => '',
                               'sujet'     => $o_annonceM->titre,
                               'reply-to'  => 'address@domain.com',
                               'message'   => $message);

    $info['type_processing']    =  "ajax";
    $info['success']            =  sendEmail($_paramMail);;
    echo json_encode($info);
  }

}else{




  $info['type_processing'] =  "no-ajax";
  echo json_encode($info);
}


 ?>

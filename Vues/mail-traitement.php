<?php 

require_once("../Utils/includeAll.php");

// On démarre la session
session_start();

extract($_POST);

//echo json_encode($_POST);


if(isset($_SESSION['utilisateurM'])){

	$userM = $_SESSION['utilisateurM'];

}

$o_annonceC     = new AnnonceC();

$o_annonceM     = $o_annonceC->getAnnonceById($idAnnonce);


// Information a remplir pour la fonction de MailGUN
$mail_formated_data = array(
						     'to'        => $userM->email,
						     'sujet'     => 'Votre annonce : '.$o_annonceM->titre. ' sur TSE Annonces',
						     'reply-to'  => $email,
						     'message'   => $text
						);

// Envoi de l'email via l'API MailGUN
sendEmail($mail_formated_data);

?>
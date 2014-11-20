<?php 

/*
	Sending email via MailJet API
*/

require_once("../Utils/includeAll.php");

var_dump("Debut MailJet");

// Création de l'objet Mailjet 
$smtp = new Mailjet();

// Accès à l'api 
$smtp->apiKey 		= '4e381e55a076541fa02078f3d19f1ba3'; 
$smtp->secretKey 	= '4de33fe2030272e12c31aba4554af3d6'; 


// Get some of your account informations
$me = $mj->userInfos();
 
// Display your firstname
var_dump($me->infos->firstname);












 ?>
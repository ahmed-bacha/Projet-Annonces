<?php 

$dir = dirname(__DIR__);

/* Chemin absolut */
define("LOCAL_PATH", $dir."/");
//echo LOCAL_PATH;


/* 
	Constantes STATUS Annonce
*/
define("NON_TRAITE", 10);
define("TRAITE", 20);
define("A_SUPPRIMER", 30);


/* 
	include MODELES
*/
require_once(LOCAL_PATH."Modeles/spdo.php");
require_once(LOCAL_PATH."Modeles/ModelInterface.php");

require_once(LOCAL_PATH."Modeles/UtilisateurM.php");
require_once(LOCAL_PATH."Modeles/AnnonceM.php");

/* 
	include CONTROLLEURS
*/
require_once(LOCAL_PATH."Controlleurs/UtilisateurC.php");
require_once(LOCAL_PATH."Controlleurs/AnnonceC.php");


/* 
	include lib tiers 
*/
require_once(LOCAL_PATH."Utils/php-mailjet.class-mailjet-0.1-2.php");


?>
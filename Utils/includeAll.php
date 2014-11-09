<?php 

$dir = dirname(__DIR__);

// Chemin absolut 
define("LOCAL_PATH", $dir."/");
//echo LOCAL_PATH;


/* 
	include MODELES
*/
require_once(LOCAL_PATH."Modeles/spdo.php");
require_once(LOCAL_PATH."Modeles/ModelInterface.php");

require_once(LOCAL_PATH."Modeles/UtilisateurM.php");

/* 
	include CONTROLLEURS
*/
require_once(LOCAL_PATH."Controlleurs/UtilisateurC.php");


/* 
	include lib tiers 
*/
require_once(LOCAL_PATH."Utils/php-mailjet.class-mailjet-0.1-2.php");


?>
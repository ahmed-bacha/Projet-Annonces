<?php

/* ADDING errors reporting */
ini_set('display_errors','On');
ini_set('error_reporting','E_ALL | E_STRICT');
error_reporting(E_ALL);


$dir = dirname(__DIR__);

/* Chemin absolut */
define("LOCAL_PATH", $dir."/");
//echo LOCAL_PATH;


/*
	Constantes STATUS Annonce
*/
define("NON_TRAITE", 		10);
define("TRAITE", 				20);
define("A_SUPPRIMER", 	30);
define("INVALIDE", 			"invalideFilePath");

/*DB variables*/

require_once("context.php");

switch (SERVEUR) {

	case 'LOCAL':

		define('DB_URL',		"localhost");
		define('DB_USER',		"root");
		define('DB_PASS',		"root");
		define('DB_NAME',		"annonce");

	break;

	case 'SERVER':

		define('DB_URL',		'127.5.182.2:3306');
		define('DB_USER',		"adminhlQkwSQ");
		define('DB_PASS',		"jZlXiTydY-3c");
		define('DB_NAME',		"annonces");

	break;

	default:

		define('DB_URL',		"localhost");
		define('DB_USER',		"root");
		define('DB_PASS',		"root");
		define('DB_NAME',		"annonce");

	break;
}


/*
	include MODELES
*/
require_once(LOCAL_PATH."Modeles/spdo.php");
require_once(LOCAL_PATH."Modeles/ModelInterface.php");

require_once(LOCAL_PATH."Modeles/UtilisateurM.php");
require_once(LOCAL_PATH."Modeles/AnnonceM.php");
require_once(LOCAL_PATH."Modeles/AdminM.php");

/*
	include CONTROLLEURS
*/
require_once(LOCAL_PATH."Controlleurs/UtilisateurC.php");
require_once(LOCAL_PATH."Controlleurs/AnnonceC.php");
require_once(LOCAL_PATH."Controlleurs/AdminC.php");
require_once(LOCAL_PATH."Controlleurs/Search.php");

/*
	include lib tiers
*/
require_once(LOCAL_PATH."Utils/php-mailjet.class-mailjet-0.1-2.php");
require_once(LOCAL_PATH."vendor/autoload.php");


/*
fonctions utils
*/
require_once(LOCAL_PATH."Utils/utilities.php");


?>

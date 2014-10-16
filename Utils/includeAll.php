<?php 

$dir = dirname(__DIR__);

// Chemin absolut 
define("LOCAL_PATH", $dir."/");
//echo LOCAL_PATH;


/* include MODELES*/
require_once(LOCAL_PATH."Modeles/spdo.php");
require_once(LOCAL_PATH."Modeles/ModelInterface.php");

require_once(LOCAL_PATH."Modeles/UtilisateurM.php");

/* include CONTROLLEURS*/
require_once(LOCAL_PATH."Controlleurs/UtilisateurC.php");



?>
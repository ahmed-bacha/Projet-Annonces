<?php 
	
require_once("../Utils/includeAll.php");


$donnees = array(
	'nom' 	=> 'utilisateur_TSE_1',
	'mdp' 	=> 'utilisateur_TSE_mdp_1',
	'email' => 'utilisateur_TSE_1@univ-st-etienne.fr');	


/*-- Création model -------------------*/
$o_utilisateurM = new UtilisateurM($donnees);

/*-- Test accesseur -------------------*/
echo 'nom de l\'utilisateur : '.$o_utilisateurM->nom.'<br />';
echo 'mot de passe de l\'utilisateur : '.$o_utilisateurM->mdp.'<br />';
echo 'email de l\'utilisateur : '.$o_utilisateurM->email.'<br />';
echo '<br />';


/*-- Test mutateur --------------------*/
$o_utilisateurM->nom 	= 'utilisateur_TSE_2';
$o_utilisateurM->mdp 	= 'utiLISATEUR';
$o_utilisateurM->email 	= 'utilisateur_TSE_2@univ-st-etienne.fr';

echo 'nom de l\'utilisateur : '.$o_utilisateurM->nom.'<br />';
echo 'mot de passe de l\'utilisateur : '.$o_utilisateurM->mdp.'<br />';
echo 'email de l\'utilisateur : '.$o_utilisateurM->email.'<br />';
echo '<br />';

// utilisateurC validateEmail TEST
echo "EMAIL VALIDE (utilisateur_TSE_2@univ-st-etienne.fr) : ";
var_dump(UtilisateurC::validateEmail('utilisateur_TSE_2@univ-st-etienne.fr'));
echo "<br>";
echo "EMAIL VALIDE (utilisateur_TSE_2univ-st-etienne.fr) : ";
var_dump(UtilisateurC::validateEmail('utilisateur_TSE_2univ-st-etienne.fr'));

// utilisateurC validatePassword TEST
echo "<br>";
echo "utilisateurC validatePassword  :: ";
var_dump(UtilisateurC::validatePassword($o_utilisateurM->mdp));

echo "<br>";
echo "utilisateurC validatePassword  LOL :: ";
var_dump(UtilisateurC::validatePassword("lol"));

/*-- Test accesseur -------------------*/
echo "<br>";
echo "<br>";
echo 'nom de l\'utilisateur : '.$o_utilisateurM->nom.'<br />';
echo 'mot de passe de l\'utilisateur : '.$o_utilisateurM->mdp.'<br />';
echo 'email de l\'utilisateur : '.$o_utilisateurM->email.'<br />';

// utilisateurC controlAndSave TEST
$utilisateurC = new UtilisateurC();
echo "<br>";
echo "utilisateurC controlAndSave :: ";
var_dump($utilisateurC->controlAndSave($o_utilisateurM));


/*-- Création controleur --------------
$o_utilisateurC = new UtilisateurC($bdd);
$o_utilisateurC->ajoute($o_utilisateurM);	
*/


 ?>
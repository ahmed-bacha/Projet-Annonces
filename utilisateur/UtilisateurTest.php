<?php 
	function chargerClasse($classe)
	{
	  require $classe.'.class.php';
	}

	spl_autoload_register('chargerClasse'); 

	$donnees = array(
		'nom' 	=> 'utilisateur_TSE_1',
		'mdp' 	=> 'utilisateur_TSE_mdp_1',
		'email' => 'utilisateur_TSE_1@univ-st-etienne.fr');

	/*-- Création model -------------------*/
	$o_utilisateurM = new UtilisateurM($donnees);

	/*-- Test accesseur -------------------*/
	echo 'nom de l\'utilisateur : '.$o_utilisateurM->getNom().'<br />';
	echo 'mot de passe de l\'utilisateur : '.$o_utilisateurM->getMdp().'<br />';
	echo 'email de l\'utilisateur : '.$o_utilisateurM->getEmail().'<br />';
	echo '<br />';

	/*-- Test mutateur --------------------*/
	$o_utilisateurM->setNom('utilisateur_TSE_2');
	$o_utilisateurM->setMdp('utilisateur_TSE_mdp_2');
	$o_utilisateurM->setEmail('utilisateur_TSE_2@univ-st-etienne.fr');

	echo 'nom de l\'utilisateur : '.$o_utilisateurM->getNom().'<br />';
	echo 'mot de passe de l\'utilisateur : '.$o_utilisateurM->getMdp().'<br />';
	echo 'email de l\'utilisateur : '.$o_utilisateurM->getEmail().'<br />';
	echo '<br />';

	/*-- Initialisation PDO ---------------*/
	$bdd = new PDO('mysql:host=localhost;dbname=annonce', 'root', 'root');

	/*-- Création controleur --------------*/
	$o_utilisateurC = new UtilisateurC($bdd);
	$o_utilisateurC->ajoute($o_utilisateurM);	
?>
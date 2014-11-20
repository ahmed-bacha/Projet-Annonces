<?php 

require_once("../Utils/includeAll.php");


$donnees = array(
	'idUtilisateur' 	=> 3,
	'nom' 				=> 'nom_annonceur_TSE',	
	'prenom' 			=> 'prenom_annonceur_TSE',
	'telephone' 		=> '0607323130',
	'titre' 			=> 'chambre - cite U - 300 euros',
	'prix' 				=> 300,
	'description' 		=> 'chambre sympatique au 3 e etage',	
	'images' 			=> 'image_1.png');

/*-- Création model -------------------*/
$o_annonceM = new AnnonceM($donnees);

// /*-- Test accesseur -------------------*/
echo 'idUtilisateur de l\'annonce : '.	$o_annonceM->idUtilisateur.'<br />';
echo 'nom de l\'annonceur : '.			$o_annonceM->nom.'<br />';
echo 'prenom de l\'annonceur :  '.		$o_annonceM->prenom.'<br />';
echo 'telephone de l\'annonceur :  '.	$o_annonceM->telephone.'<br />';
echo 'titre de l\'annonce :  '.			$o_annonceM->titre.'<br />';
echo 'prix de l\'annonce :  '.			$o_annonceM->prix.'<br />';
echo 'description de l\'annonce :  '.	$o_annonceM->description.'<br />';
echo 'image de l\'annonce :  '.			$o_annonceM->images.'<br />';
echo '<br />';


/*-- Test mutateur --------------------*/

$o_annonceM->prix   = 299;
$o_annonceM->images = "art.png";

echo "<pre>";
print_r($o_annonceM);
echo "</pre>";




 ?>
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


/*-- Test ADD --*/

$response 	= false;

$o_annonceC = new AnnonceC();
//$response  = $o_annonceC->addAnnonce($o_annonceM);

var_dump("ADD Annonce : $response");

/*-- Test UPDATE --*/

$o_annonceC = new AnnonceC();

$o_annonceM->id     = 18;

$o_annonceM->prix   = 340;

$o_annonceM->titre  = "F1 Place Carnot";


$response  	= $o_annonceC->updateAnnonce($o_annonceM);

echo "<br/>";
var_dump("UP-DATE Annonce : $response");


/*-- Test GET --*/

/*-- $o_annonceM  = $o_annonceC->getAnnonceById(21);

echo "<br/>";

echo "<pre>";
var_dump($o_annonceM);
echo "</pre>"; --*/


$tab_annonces = $o_annonceC->getAllAnnonces();

echo sizeof($tab_annonces);
echo "<br/>";

foreach ($tab_annonces as $value) {
	 
     show($value[9]);
     if ((strpos($value[9],';'))!== false){
     		$images=explode(";",$value[9]);
            show($images);
     	echo "ok" ;
     }else {
     	echo " pas de ;";
     }
     
}


show($tab_annonces);

/*-- Test DELETE --*/

// $response  = $o_annonceC->deleteAnnonce($o_annonceM);

// echo "<br/>";
// var_dump("SUPPRIMER Annonce : $response");


/*-- Test concatImageNames --*/

/* $response  = AnnonceC::concatImagesNames("image_1.jpg", "iron_man.png", "wordline.png");

$o_annonceM->images = $response;

echo "<br/>";
var_dump($response);

/*-- Test deConcatImageNames --*/

$response  = $o_annonceC->deConcatImagesNames($o_annonceM);

echo "<br/>";

echo "<pre>";
var_dump($response);
echo "</pre>";


 ?>
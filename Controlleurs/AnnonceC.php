<?php

/**
 * Classe utilisateur Controlleur
 *
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @package 	Controlleurs
 */

class AnnonceC
{
	/**
	* Change le statut de l'anonce,
	* 10 : NON_TRAITEE,
	* 20 : ACCEPTEE,
	* 30 : REFUSEE,
	* @param  int id : id de l'annonce
	*/
	function getAnnonceById($id)
	{
		return AnnonceM::getAnnonceById($id);
	}

	/**
	* Change le statut de l'anonce,
	* 10 : NON_TRAITEE,
	* 20 : ACCEPTEE,
	* 30 : REFUSEE,
	* @param  int id : id de l'annonce
	*/
	function getAnnonceByUserId($id)
	{
		return AnnonceM::getAnnonceByUserId($id);
	}

	function getAllAnnonces()
	{
		return AnnonceM::getAllAnnonces();
	}


	/**
	* Ajoute une annonce de la BDD
	* @param 	AnnonceM		: objet annonceM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function addAnnonce($o_AnnonceM){
		return $o_AnnonceM->add();
	}


	/**
	* Supprime une annonce de la BDD
	* @param 	AnnonceM		: objet annonceM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function deleteAnnonce($o_AnnonceM){
		return $o_AnnonceM->delete();
	}

	/**
	* Update les champs d'une annonce dans la BDD
	* @param 	AnnonceM		: objet AnnonceM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function updateAnnonce($o_AnnonceM)
	{
		return $o_AnnonceM->update();
	}

	function changeState($nouveau_statut, $o_AnnonceM){
		$o_AnnonceM->changeState($nouveau_statut);
	}

	/**
	* Mets en forme de string les 3 liens des images (séparés par ;)
	*
	* @param  STRING link 1 : 1er lien image
	* @param  STRING link 2 : 1er lien image
	* @param  STRING link 3 : 1er lien image
	*
	* @return STRING : les 3 liens concatener
	*/
	public static function concatImagesNames($_images){

		return implode(";", $_images);

	}

	/**
	*
	* @return ARRAY : les 3 liens concatener
	*/
	public function deconcatImages($o_AnnonceM){

		$_images = $o_AnnonceM->images;

		if(!empty($_images)){

			if((strpos( $_images, ';') !== FALSE) ){

				$_array = explode(";", $_images);

				return $_array;

			}else{
				return $_images;
			}

		}else{
			return null;
		}

	}


	/**
	* Convertie la valeur d'un statut d'annonce en STRING
	* @param  INT 	statut 	: statut d'une annonce
	* @return STRING 				: les 3 liens concatener
	*/
	public static function statutVal($statut){

		if($statut == NON_TRAITE){
			return '<span class="label label-warning">Non traitée</span>';
		}

		if($statut == TRAITE){
			return '<span class="label label-success">Traitée</span>';
		}

		if($statut == A_SUPPRIMER){
			return '<span class="label label-danger">A supprimer</span>';
		}

	}

	/*
	* @return ARRAY : les 3 liens concatener
	*/
	public function deConcatImagesNames($o_AnnonceM){

			return explode(";", $o_AnnonceM->images);

	}


	/**s
	* Supprime les annonces en BDD avec un statut A_SUPPRIMER
	* @return 	INT 			: Nombre d'annonces supprimées
	*/
	public  function purgeAnnonces(){

		$compteur = 1;

		$_allAnnonces = $this->getAllAnnonces();

		foreach ($_allAnnonces as $o_annonce) {

			if($o_annonce->statut == A_SUPPRIMER){

				$o_annonce->delete();

				$compteur++;

			}

		}

		return $compteur;

	}


	/**
	* Supprime une annonce de la BDD
	* @param 	id				: objet annonceM
	* @return 	bool 			: true "success" , false "failure"
	*/
	static function deleteAnnoncesByUserId($id_utilisateur){

		return	AnnonceM::deleteAnnoncesByUserId($id_utilisateur);

	}




	//fonction pour vérifier la conformité d'un numéro de tel Français
	static function verifTelFr($chaine){
		$regex = "#^0[1-68]([-. ]?[0-9]{2}){4}$#";
		if (preg_match($regex,$chaine)){
			return true;
		} else {
			return false;
		}

	}
}

?>

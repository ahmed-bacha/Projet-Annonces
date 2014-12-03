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
	* @param  ARRAY  : liens des images
	* @return STRING : les 3 liens concatener
	*/
	public static function concatImagesNames($links_array){

		return implode(";", $links_array);
	}

	/**
	*
	* @return ARRAY : les 3 liens des images
	*/
	public function deConcatImagesNames($o_AnnonceM){

		return explode(";", $o_AnnonceM->images);

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

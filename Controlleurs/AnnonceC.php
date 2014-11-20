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
	* Supprime un annonce de la BDD 
	* @param 	AnnonceM		: objet annonceM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function deleteAnnonce($o_AnnonceM){
		return $o_AnnonceM->delete();
	}

	/**
	* Update les champs d'un utilisateur en BDD 
	* @param 	utilisateurM	: objet utilisateurM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function updateUser($o_AnnonceM)
	{
		return $o_AnnonceM->update();
	}

	function changeState($nouveau_statut, $o_AnnonceM){
		$o_AnnonceM->changeState($nouveau_statut);
	}
}

?>
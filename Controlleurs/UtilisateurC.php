<?php 

/**
 * Classe utilisateur Controlleur
 * 
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @package 	Controlleurs	
 */
class UtilisateurC
{

	/**
	* Vérifie si le champs email est valide
	* @param 	email			: email à valider
	* @return 	bool 			: true "success" , false "failure"
	*/
	function validateEmail($email)
	{
		if (!empty($email)) 
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/**
	* Vérifie si le champs mdp est valide
	* @param 	pass			: mot de passe à valider
	* @return 	bool 			: true "success" , false "failure"
	*/
	function validatePassword($pass)
	{
		if (!empty($pass)) 
		{
			if (strlen($pass) >= 6) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/**
	* Vérifie les champs d'un utilisateur et l'enregistre en BDD
	* Si il n y a pas d'erreurs
	* @param 	utilisateurM	: objet utilisateurM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function controlAndSave($utilisateurM)
	{
		// to do email,pass
		if (!empty($utilisateurM->nom) ) 
		{
			$valide = false;

			if (self::validatePassword($utilisateurM->mdp) && self::validateEmail($utilisateurM->email))	
			{
				$valide = true;
				// to do SAVE
			}

			return $valide;
	
		}else{
			return false;
		}
	}


}


 ?>
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
	static function validateEmail($email)
	{
		$result =  false;

		if (!empty($email)){
			if (!empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
				$result =  true;
			}else{
				$result =  false;
			}
		}

		return $result;
	}


	/**
	* Vérifie si le champs mdp est valide
	* @param 	pass			: mot de passe à valider
	* @return 	bool 			: true "success" , false "failure"
	*/
	static function validatePassword($pass)
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
		$valide = false;

		// to do email,pass
		if (($utilisateurM->nom))
		{
			if (self::validatePassword($utilisateurM->mdp) && self::validateEmail($utilisateurM->email))
			{
				$utilisateurM->add();
				$valide = true;
			}
			return $valide;
		}else{
			return $valide;
		}
	}

	/**
	* Vérifie si l'email et le mdp existent en BDD
	* @param  string email   	:  email de l'utilisateur
	* @param  string password 	:  mdp de l'utilisateur
	* @return 	bool 			: true "success" , false "failure"
	*/
	function checkUser($email,$password)
	{
		return utilisateurM::check($email,$password);
	}

	/**
	* Teste si un utilisateur existe déjà dans la BDD
	* @return bool 	: true "utilisateur existe" , false "utilisateur inexistant"
	*/
	public static function checkById($_id){
		return utilisateur::checkById($_id);
	}


	/**
	* Recupère un objet utilisateur dans la BDD si (email,password) existent
	* sinon NULL
	* @param  string email   	:  email de l'utilisateur
	* @param  string password 	:  mdp de l'utilisateur
	* @return 	utilisateurM 	:  objet utilisateur ou NULL
	*/
	function getUser($email,$password)
	{
		return utilisateurM::getUser($email,$password);
	}


	/**
	* Recupère un objet utilisateur dans la BDD si (email,password) existent
	* sinon NULL
	* @param  string email   	:  email de l'utilisateur
	* @param  string password 	:  mdp de l'utilisateur
	* @return 	utilisateurM 	:  objet utilisateur ou NULL
	*/
	function getUserById($id)
	{
		return utilisateurM::getUserById($id);
	}

	/**
	* Supprime un utilisateur de la BDD
	* @param 	utilisateurM	: objet utilisateurM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function deleteUser($utilisateurM)
	{
		return $utilisateurM->delete();
	}

	/**
	* Update les champs d'un utilisateur en BDD
	* @param 	utilisateurM	: objet utilisateurM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function updateUser($utilisateurM)
	{
		return $utilisateurM->update();
	}

	/**
	* Liste des utilisateurs présents en BDD
	* @return 	ARRAY 			: Objet UtilisateurM
	*/
	static function getAllUsers()
	{
		return $utilisateurM::getAllUsers();
	}


}


 ?>

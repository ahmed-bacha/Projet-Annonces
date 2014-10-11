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
	* Vérifie les champs d'un utilisateur et l'enregistre en BDD
	* Si il n y a pas d'erreurs
	* @param 	utilisateurM	: objet utilisateurM
	* @return 	bool 			: true "success" , false "failure"
	*/
	function controlAndSave($utilisateurM)
	{
		if ($utilisateurM->nom != "") 
		{
			if (strpos($utilisateurM->email, '@') && strpos($utilisateurM->email, '.'))	
			{
					if (strlen($utilisateurM->mdp) > 4) 
					{
						$utilisateurM->add();
						return true;
					}
					else
					{
						echo "Le mot de passe doit contenir plus de 5 characteres";
						return false;
					}
			}
			else 
			{
				echo "Champ Email non valide !";
				return false;
			}	
		}
		else
		{
			echo "Champ Nom Vide !";
			return false;
		}
	}


}


 ?>
<?php

/**
* Classe admin Controlleur
*
* @version 	1.00
* @license 	http://www.gnu.org/copyleft/gpl.html GPL
* @package 	Controlleurs
*/
class AdminC
{

  /**
  * Vérifie les champs d'un admin et l'enregistre en BDD
  * Si il n y a pas d'erreurs
  * @param 	adminM     	: objet adminM
  * @return 	bool 			: true "success" , false "failure"
  */
  function controlAndSave($adminM)
  {
    $valide = false;

    if ($adminM->login != '' && $adminM->mdp != '')
    {

      $adminM->add();
      $valide = true;

      return $valide;
    }else{
      return $valide;
    }
  }

  /**
  * Vérifie si le login et le mdp existent en BDD
  * @param  string login   	:  login de l'admin
  * @param  string password 	:  mdp de l'admin
  * @return 	bool 			: true "success" , false "failure"
  */
  function checkAdmin($login,$password)
  {
    return AdminM::check($login,$password);
  }

  /**
  * Teste si un admin existe déjà dans la BDD
  * @return bool 	: true "admin existe" , false "admin inexistant"
  */
  public static function checkById($_id){
    return AdminM::checkById($_id);
  }


  /**
  * Recupère un objet admin dans la BDD si (login,password) existent
  * sinon NULL
  * @param   string login   	  :  login de l'utilisateur
  * @param   string password   	:  mdp de l'utilisateur
  * @return 	adminM    	:  objet adminM ou NULL
  */
  function getAdmin($login,$password)
  {
    return AdminM::getAdmin($login,$password);
  }


  /**
  * Recupère un objet admin dans la BDD si (login,password) existent
  * sinon NULL
  * @param   string login   	  :  login de l'utilisateur
  * @param   string password   	:  mdp de l'utilisateur
  * @return 	adminM    	:  objet adminM ou NULL
  */
  function getAdminById($id)
  {
    return AdminM::getAdminById($id);
  }

  /**
  * Supprime un admin de la BDD
  * @param 	adminM    	: objet adminM
  * @return 	bool 			: true "success" , false "failure"
  */
  function deleteAdmin($adminM)
  {
    return $adminM->delete();
  }

  /**
  * Update les champs d'un admin en BDD
  * @param 	adminM	    : objet adminM
  * @return 	bool 			: true "success" , false "failure"
  */
  function updateAdmin($adminM)
  {
    return $adminM->update();
  }

  function getAllAdmin()
  {
    return AdminM::getAllAdmin();
  }

  function testAdministrateurExist()
  {
    $donnees = array(
      'login' 	=> 'admin',
      'mdp' 	  => 'admin');

      $admin = new AdminM($donnees);

    if(!AdminM::checkByLogin($admin->login))
    {
      SELF::controlAndSave($admin);
    }
  }


  static function isAdministrateur($login, $pass)
  {
    if($login == "admin"){
      return true;
    }else{
      return false;
    }
  }


}


?>

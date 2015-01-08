<?php

/**
* Classe Search
*
* @version 	1.00
* @license 	http://www.gnu.org/copyleft/gpl.html GPL
* @package 	Controlleurs
*/

class Search {

  /**
  * @var objet PDO
  */
  private static $db;

  /**
  * @var String
  */
  private $domain;


  /**
  * Constructeur de la classe avec un tableau de paramètres
  * Exemple :
  * @param STRING domain : domain de la recherche
  */
  public function __construct($str){

    $this->domain = $str;

  }

  /**
  * Recherche un utilisateur ou une annonce en BDD suivant un STRING
  * passsé en param.
  * @param 	  STRING 	searchString		: chaine de recherche
  * @return 	ARRAY   resultSet
  */
  function searchFor($searchString)
  {

    // on récupère l'instance PDO
    $db  = SPDO::getInstance();

    $searchString = $searchString."%";

    try {

      $sql = null;

      if($this->domain == "utilisateurs"){

        $sql = 'SELECT * FROM utilisateurM
                WHERE nom   LIKE :searchString
                OR email    LIKE :searchString';

      }

      if($this->domain == "annonces"){

        $sql = 'SELECT * FROM annonceM
                WHERE titre     LIKE :searchString
                OR  description LIKE :searchString';

      }

      // preparation de la requete
      $q = $db->prepare($sql);

      $q->bindParam(':searchString', 	$searchString);

      $q->execute();

      $result = array();

      while ($_line = $q->fetch(PDO::FETCH_ASSOC)) {

        if($this->domain == "utilisateurs"){
          $object = new UtilisateurM($_line);
        }

        if($this->domain == "annonces"){
          $object = new AnnonceM($_line);
        }

        array_push($result, $object);

      }

      return $result;


    }catch (PDOException $e) {

      echo 'Error dans la classe '.__CLASS__.'::'. __FUNCTION__ .'::'. $e->getMessage(),'error';
      return false;

    }

  }


  /**
  * Setter pour tous les champs de la classe
  * Exemple d'utilisation :
  * $user = UtilisateurM($donnees);
  * $user->nom = 'Pierre';
  */
  public function __set($name, $value){
    // si la proprieté existe dans la classe
    if (property_exists($this, $name)){
      $this->$name = $value;
    }else{
      trigger_error("Variable $name non modifiee", E_USER_WARNING);
    }
  }

  /**
  * Getter pour tous les champs de la classe
  * Exemple d'utilisation :
  * $user = UtilisateurM($donnees);
  * $user->nom; // retourne le nom;
  * @return champs de la classe
  */
  public function __get($name){
    // si la proprieté existe dans la classe
    if (property_exists($this, $name)) {
      return $this->$name;
    }else{
      trigger_error("Variable $name non trouvee", E_USER_WARNING);
    }
  }




}

?>

<?php

/**
* Classe Admin Model
*
* @version 	1.00
* @license 	http://www.gnu.org/copyleft/gpl.html GPL
* @package 	Modeles
*/

class AdminM implements ModelInterface
{
  /**
  * @var objet PDO
  */
  private static $db;

  /**
  * @var int
  */
  private $id;

  /**
  * @var varchar
  */
  private $login;

  /**
  * @var varchar
  */
  private $mdp;


  /**
  * Constructeur de la classe avec un tableau de paramètres
  * Exemple :
  * @param $donnees = array(
  *			'login' 	=> 'login',
  *			'mdp' 	=> 'mdp',
  * 			);
  */
  public function __construct($donnees){
    $this->hydrate($donnees);
  }


  /**
  * Renseigne les champs de l'objet à partir d'un tableau d'élements
  * Exemple :
  * @param $donnees = array(
  *			'login' 	=> 'login',
  *			'mdp' 	=> 'mdp',
  * 			);
  */
  public function hydrate($donnees){

    if (isset($donnees['id'])){
      $this->id = $donnees['id'];
    }

    if (isset($donnees['login'])){
      $this->login = $donnees['login'];
    }

    if (isset($donnees['mdp'])){
      $this->mdp = $donnees['mdp'];
    }

  }

  /**
  * Ajoute un admin dans la BDD à partir des champs
  * de cette classe
  * @return bool 	: true "success" , false "failure"
  */
  public function add(){

    // on récupère l'instance PDO
    $db  = SPDO::getInstance();

    try {
      // preparation de la requete
      $q = $db->prepare(
      'INSERT INTO
      AdminM (login, mdp)
      VALUES (:login, :mdp)'
      );

      // on remplace avec les vraies valeurs
      $q->bindValue(':login', 	$this->login);
      $q->bindValue(':mdp', 	  $this->mdp);

      // execution de la requete
      $q->execute();
      return true;
    }catch (PDOException $e) {
      echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
      return false;
    }
  }


  /**
  * Supprime un admin de la BDD
  * @return bool 	: true "success" , false "failure"
  */
  public function delete(){

    // on récupère l'instance PDO
    $db  = SPDO::getInstance();

    try {
      // preparation de la requete
      $q = $db->prepare(
      'DELETE FROM
      AdminM
      WHERE id = (:id)'
      );

      // on remplace avec les vraies valeurs
      $q->bindValue(':id',   $this->id);

      // execution de la requete
      $q->execute();
      return true;
    }catch (PDOException $e) {
      echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
      return false;
    }
  }


  public function update(){

    {
      $db  = SPDO::getInstance();

      try {
        $req=$db->prepare('UPDATE AdminM
        SET login = :login,
        mdp = :mdp
        WHERE id = :id');

        $req->bindValue(':id',      $this->id);
        $req->bindValue(':login',   $this->login);
        $req->bindValue(':mdp',     $this->mdp);


        $req->execute();
        return true;

      }catch (PDOException $e) {
        echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
        return false;
      }
    }
  }


  /**
  * Test si un admin existe déjà dans la BDD
  * @return bool 	: true "admin existe" , false "admin inexistant"
  */
  public static function check($login,$pass){

    // on récupère l'instance PDO
    $db  = SPDO::getInstance();

    try {
      // preparation de la requete
      $q = $db->prepare(
      'SELECT id FROM
      AdminM
      WHERE login = (:login) AND mdp = (:pass)'
      );

      // on remplace avec les vraies valeurs
      $q->bindValue(':login',  $login);
      $q->bindValue(':pass',   $pass);

      // execution de la requete
      $q->execute();

      // on compte le nombre de ligne provenant du résultat de la requête
      $result = $q->rowCount();
      $q->closeCursor();

      // Teste si le résultat de la requête est vide
      if (empty($result)) {
        return false;
      }
      else{
        return true;
      }

    }catch (PDOException $e) {
      echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
    }
  }



  /**
  * Test si un admin existe déjà dans la BDD
  * @return bool 	: true "admin existe" , false "admin inexistant"
  */
  public static function checkById($_id){

    // on récupère l'instance PDO
    $db  = SPDO::getInstance();

    try {
      // preparation de la requete
      $q = $db->prepare(
      'SELECT id FROM
      AdminM
      WHERE id = (:id) '
      );

      // on remplace avec les vraies valeurs
      $q->bindValue(':id', $_id);


      // execution de la requete
      $q->execute();

      // on compte le nombre de ligne provenant du résultat de la requête
      $result = $q->rowCount();
      $q->closeCursor();

      // Teste si le résultat de la requête est vide
      if (empty($result)) {
        return false;
      }
      else{
        return true;
      }

    }catch (PDOException $e) {
      echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
    }
  }



  /**
  * Retourne un admin
  * @return AdminM : o_AdminM "admin existe" , bool : false "admin inexistant"
  */
  public static function getAdmin($_login, $_password){

    if (self::check($_login, $_password)) {

      // on récupère l'instance PDO
      $db  = SPDO::getInstance();

      //Connexion à la base de données
      try {
        // preparation de la requete
        $q = $db->prepare(
        'SELECT * FROM
        AdminM
        WHERE login = :login AND mdp = :mdp
        LIMIT 1'
        );

        // on remplace avec les vraies valeurs
        $q->bindValue(':login', $_login);
        $q->bindValue(':mdp',   $_password);

        // execution de la requete
        $q->execute();

        // on compte le nombre de ligne provenant du résultat de la requête
        $_donnees = $q->fetch(PDO::FETCH_ASSOC);

        //Création nouvelle admin
        $o_AdminM = new AdminM($_donnees);
        return $o_AdminM;
      }catch (PDOException $e) {
        echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
      }
    } else {
      return null;
    }
  }



  /**
  * Retourne un Admin par son id
  * @return AdminM : o_AdminM "admin existe" , bool : false "admin inexistant"
  */
  public static function getAdminById($_id){

    if (self::checkById($_id)) {

      // on récupère l'instance PDO
      $db  = SPDO::getInstance();

      //Connexion à la base de données
      try {
        // preparation de la requete
        $q = $db->prepare(
        'SELECT * FROM
        AdminM
        WHERE id = :id'
        );

        // on remplace avec les vraies valeurs
        $q->bindValue(':id', $_id);

        // execution de la requete
        $q->execute();

        // on compte le nombre de ligne provenant du résultat de la requête
        $_donnees = $q->fetch(PDO::FETCH_ASSOC);

        //Création admin
        $o_AdminM = new AdminM($_donnees);
        return $o_AdminM;
      }catch (PDOException $e) {
        echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
      }
    } else {
      return null;
    }
  }


  /**
  * Setter pour tous les champs de la classe
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

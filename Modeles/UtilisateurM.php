<?php

/**
 * Classe utilisateur Modele
 *
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @package 	Modeles
 */

class UtilisateurM implements ModelInterface
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
	private $nom;

	/**
 	* @var varchar
 	*/
	private $mdp;

	/**
 	* @var varchar
 	*/
	private $email;

	/**
	* Constructeur de la classe avec un tableau de paramètres
	* Exemple :
	* @param $donnees = array(
	*			'nom' 	=> 'user10',
	*			'mdp' 	=> 'user10',
	*			'email' => 'user10@telecom-st-etienne.fr'
	* 			);
	*/
	public function __construct($donnees){
		$this->hydrate($donnees);
	}


	/**
	* Renseigne les champs de l'objet à partir d'un tableau d'élements
	* Exemple :
	* @param $donnees = array(
	*			'nom' 	=> 'user10',
	*			'mdp' 	=> 'user10',
	*			'email' => 'user10@telecom-st-etienne.fr'
	* 			);
	*/
	public function hydrate($donnees){

		if (isset($donnees['id'])){
    		$this->id = $donnees['id'];
  		}

    	if (isset($donnees['nom'])){
    		$this->nom = $donnees['nom'];
  		}

  		if (isset($donnees['mdp'])){
    		$this->mdp = $donnees['mdp'];
  		}

  		if (isset($donnees['email'])){
    		$this->email = $donnees['email'];
  		}
	}

	/**
	* Ajoute un utilisateur dans la BDD à partir des champs
	* de cette classes
	* @return bool 	: true "success" , false "failure"
	*/
	public function add(){

		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		try {
			// preparation de la requete
			$q = $db->prepare(
					'INSERT INTO
					UtilisateurM (nom, mdp, email)
	 				VALUES (:nom, :mdp, :email)'
	 				);

			// on remplace avec les vraies valeurs
	 		$q->bindValue(':nom', 	$this->nom);
		 	$q->bindValue(':mdp', 	$this->mdp);
		 	$q->bindValue(':email', $this->email);

		 	// execution de la requete
		 	$q->execute();
		 	return true;
		}catch (PDOException $e) {
			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			return false;
		}
	}


	/**
	* Supprime un utilisateur de la BDD
	* @return bool 	: true "success" , false "failure"
	*/
	public function delete(){

		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		try {
			// preparation de la requete
			$q = $db->prepare(
					'DELETE FROM
					 UtilisateurM
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
            $req=$db->prepare('UPDATE UtilisateurM
            					SET nom = :nom,
            					mdp = :mdp,
            					email = :email
            					WHERE id = :id');

            $req->bindValue(':id',    $this->id);
            $req->bindValue(':nom',   $this->nom);
	 		$req->bindValue(':mdp',   $this->mdp);
	 		$req->bindValue(':email', $this->email);

	 		$req->execute();
	 		return true;

		}catch (PDOException $e) {
			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			return false;
		}
	}
	}


	/**
	* Teste si un utilisateur existe déjà dans la BDD
	* @return bool 	: true "utilisateur existe" , false "utilisateur inexistant"
	*/
	public static function check($email,$pass){

		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		try {
			// preparation de la requete
			$q = $db->prepare(
					'SELECT id FROM
					 UtilisateurM
					 WHERE email = (:email) AND mdp = (:pass)'
	 				);

			// on remplace avec les vraies valeurs
	 		$q->bindValue(':email', $email);
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
	* Teste si un utilisateur existe déjà dans la BDD
	* @return bool 	: true "utilisateur existe" , false "utilisateur inexistant"
	*/
	public static function checkById($_id){

		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		try {
			// preparation de la requete
			$q = $db->prepare(
					'SELECT id FROM
					 UtilisateurM
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
	* Retourne un utilisateur par son mail
	* @return UtilisateurM : o_UtilisateurM "utilisateur existe" , bool : false "utilisateur inexistant"
	*/
	public static function getUser($_email, $_password){

		if (self::check($_email, $_password)) {

			// on récupère l'instance PDO
			$db  = SPDO::getInstance();

			//Connexion à la base de données
			try {
				// preparation de la requete
				$q = $db->prepare(
						'SELECT * FROM
						 UtilisateurM
						 WHERE email = :email AND mdp = :mdp
						 LIMIT 1'
		 				);

				// on remplace avec les vraies valeurs
		 		$q->bindValue(':email', $_email);
		 		$q->bindValue(':mdp',   $_password);

			 	// execution de la requete
			 	$q->execute();

			 	// on compte le nombre de ligne provenant du résultat de la requête
			 	$_donnees = $q->fetch(PDO::FETCH_ASSOC);

				//Création nouvelle utilisateur et renvoie
				$o_UtilisateurM = new UtilisateurM($_donnees);
				return $o_UtilisateurM;
			}catch (PDOException $e) {
				echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			}
		} else {
			return null;
		}
	}



	/**
	* Retourne un utilisateur par son id
	* @return UtilisateurM : o_UtilisateurM "utilisateur existe" , bool : false "utilisateur inexistant"
	*/
	public static function getUserById($_id){

		if (self::checkById($_id)) {

			// on récupère l'instance PDO
			$db  = SPDO::getInstance();

			//Connexion à la base de données
			try {
				// preparation de la requete
				$q = $db->prepare(
						'SELECT * FROM
						 UtilisateurM
						 WHERE id = :id'
		 				);

				// on remplace avec les vraies valeurs
		 		$q->bindValue(':id', $_id);

			 	// execution de la requete
			 	$q->execute();

			 	// on compte le nombre de ligne provenant du résultat de la requête
			 	$_donnees = $q->fetch(PDO::FETCH_ASSOC);

				//Création nouvelle utilisateur et renvoie
				$o_UtilisateurM = new UtilisateurM($_donnees);
				return $o_UtilisateurM;
			}catch (PDOException $e) {
				echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			}
		} else {
			return null;
		}
	}


	/**
	*	Retourne la liste de tous les utilisateurs
	*/
	public static function getAllUsers(){

		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		//Connexion à la base de données
		try {

		// preparation de la requete
		$q = $db->prepare(
											'SELECT *
											FROM utilisateurM
											ORDER BY id DESC'
										 );

		// execution de la requete

		$q->execute();

		$result = array();

		while ($_line = $q->fetch(PDO::FETCH_ASSOC)) {

			$o_utilisateurM = new UtilisateurM($_line);

			array_push($result, $o_utilisateurM);

		}

		return $result;

		} catch (PDOException $e) {

				echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';

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

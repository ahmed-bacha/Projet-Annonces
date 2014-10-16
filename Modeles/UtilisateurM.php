<?php 
	
/**
 * Classe utilisateur Modele
 * 
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL	
 * @package 	Modeles
 */

class UtilisateurM extends spdo implements ModelInterface  
{
	
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
					 WHERE nom = (:nom) AND email = (:email) AND mdp = (:mdp)'
	 				);

			// on remplace avec les vraies valeurs
	 		$q->bindValue(':nom',   $this->nom);
	 		$q->bindValue(':email', $this->email);
	 		$q->bindValue(':mdp',   $this->mdp);

		 	// execution de la requete
		 	$q->execute();
		 	return true;
		}catch (PDOException $e) {
			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			return false;
		}
	}


	public function update(){
		# code here ....
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
					 WHERE email = (:email) AND mdp = (:mdp)'
	 				);

			// on remplace avec les vraies valeurs
	 		$q->bindValue(':email', $email);
	 		$q->bindValue(':mdp',   $mdp);

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
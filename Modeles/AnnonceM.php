<?php

/**
 * Classe utilisateur Modele
 *
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @package 	Modeles
 */

class AnnonceM implements ModelInterface{
	/**
 	* @var objet PDO
 	*/
	private static $db;

	/**
 	* @var int
 	*/
	private $id;

	/**
 	* @var int
 	*/
	private $idUtilisateur;

	/**
 	* @var int
 	*/
	private $statut;

	/**
 	* @var varchar
 	*/
	private $nom;

	/**
 	* @var varchar
 	*/
	private $prenom;

	/**
 	* @var varchar
 	*/
	private $telephone;

	/**
 	* @var varchar
 	*/
	private $titre;

	/**
 	* @var int
 	*/
	private $prix;

	/**
 	* @var text
 	*/
	private $description;

	/**
 	* @var varchar
 	*/
	private $images;

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
	* 		);
	*/
	public function hydrate($donnees){

		if (isset($donnees['id'])){
    		$this->id = $donnees['id'];
  		}

  		if (isset($donnees['idUtilisateur'])){
    		$this->idUtilisateur = $donnees['idUtilisateur'];
  		}

  		if (isset($donnees['statut'])){

    		$this->statut = $donnees['statut'];

  		}else{

  			$this->statut = NON_TRAITE;

  		}   		

    	if (isset($donnees['nom'])){
    		$this->nom = $donnees['nom'];
  		}

  		if (isset($donnees['prenom'])){
    		$this->prenom = $donnees['prenom'];
  		}

  		if (isset($donnees['telephone'])){
    		$this->telephone = $donnees['telephone'];
  		}

  		if (isset($donnees['titre'])){
    		$this->titre = $donnees['titre'];
  		}

  		if (isset($donnees['prix'])){
    		$this->prix = $donnees['prix'];
  		}

  		if (isset($donnees['description'])){
    		$this->description = $donnees['description'];
  		}

  		if (isset($donnees['images'])){
    		$this->images = $donnees['images'];
  		}
	}

	/**
	* Ajoute une annonce dans la BDD à partir des champs
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
					annonceM (idUtilisateur, statut, nom, prenom, telephone, titre, prix, description, images)
	 				VALUES (:idUtilisateur, :statut, :nom, :prenom, :telephone, :titre, :prix, :description, :images)'
	 				);

			// on remplace avec les vraies valeurs
			$q->bindValue(':idUtilisateur'	, 	$this->idUtilisateur);
			$q->bindValue(':statut'			, 	$this->statut);
	 		$q->bindValue(':nom'			, 	$this->nom);
	 		$q->bindValue(':prenom'			, 	$this->prenom);
	 		$q->bindValue(':telephone'		, 	$this->telephone);
		 	$q->bindValue(':titre'			, 	$this->titre);
		 	$q->bindValue(':prix'			, 	$this->prix);
		 	$q->bindValue(':description'	, 	$this->description);
		 	$q->bindValue(':images'			, 	$this->images);

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
					 annonceM
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

		$db  = SPDO::getInstance();

		try {
            $req=$db->prepare('UPDATE annonceM

            					SET idUtilisateur 	= :idUtilisateur,
            							statut 					= :statut,
            							nom 						= :nom,
            							prenom 					= :prenom,
            							telephone 			= :telephone,
            							titre 					= :titre,
            							prix 						= :prix,
            							description 		= :description,
            							images 					= :images

            					WHERE id = :id');

	 		$req->bindValue(':idUtilisateur'	, 	$this->idUtilisateur);
	 		$req->bindValue(':statut'			, 	$this->statut);
	 		$req->bindValue(':nom'				, 	$this->nom);
		 	$req->bindValue(':prenom'			, 	$this->prenom);
		 	$req->bindValue(':telephone'		, 	$this->telephone);
		 	$req->bindValue(':titre'			, 	$this->titre);
		 	$req->bindValue(':prix'				, 	$this->prix);
		 	$req->bindValue(':description'		, 	$this->description);
		 	$req->bindValue(':images'			, 	$this->images);
		 	$req->bindValue(':id'				, 	$this->id);

	 		$req->execute();
	 		return true;

		}catch (PDOException $e) {
			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
			return false;
		}
	}

	/**
	* Permet le changement du statut
	* @return bool 	: true "utilisateur existe" , false "utilisateur inexistant"
	*/
	public function changeState($nouveau_statut){
		$this->statut = $nouveau_statut;
	}

	/**
	* Retourne une annonce par son id
	* @return AnnonceM : o_AnnonceM
	*/
	public static function getAnnonceById($_id){
		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		//Connexion à la base de données
		try {
			// preparation de la requete
			$q = $db->prepare(
					'SELECT *
					FROM annonceM
					WHERE id = :id'
		 		);

			// on remplace avec les vraies valeurs
		 	$q->bindValue(':id', $_id);

			// execution de la requete
			$q->execute();

			// on compte le nombre de ligne provenant du résultat de la requête
			$_donnees = $q->fetch(PDO::FETCH_ASSOC);

			//Création nouvelle utilisateur et renvoie
			$o_AnnonceM = new AnnonceM($_donnees);
			return $o_AnnonceM;
		}catch (PDOException $e) {
				echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
		}
	}

	/**
	* Retourne les annonces suivant l'id de l'utilisateur sollicité
	* @return requete comportant toutes les requetes de l'utilisateur suivant son id
	*/
	public static function getAnnonceByUserId($_idUtilisateur){
		// on récupère l'instance PDO
		$db  = SPDO::getInstance();

		//Connexion à la base de données
		try {
				// preparation de la requete
				$q = $db->prepare(
				'SELECT *
				FROM annonceM
				WHERE idUtilisateur = :idUtilisateur'
			);

			// on remplace avec les vraies valeurs
			$q->bindValue(':idUtilisateur', $_idUtilisateur);

			// execution de la requete
			$q->execute();

			// Retour de la requête comportant toutes les annonces fonctions de l'id utilisateur
			return $q;

		}catch (PDOException $e) {
			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';
		}
	}

  /**
  *Reourne toutes les annonces
  */
  public static function getAllAnnonces ($_statut = null) {

		$db  = SPDO::getInstance();

		try {

			$_response = array();

			$_constantArray = array(
																NON_TRAITE,
																TRAITE,
																A_SUPPRIMER
															);

			if(!is_null($_statut) AND in_array($_statut, $_constantArray)){

				$q = $db->prepare(

					'SELECT *
					FROM annonceM
					WHERE statut = :statut
					ORDER BY id DESC ; '

				);

				$q->bindValue(':statut', $_statut);

			} else {

				$q = $db->prepare(

					'SELECT *
					FROM annonceM
					ORDER BY id DESC ; '

				);

			}

			$q->execute();

			while ($_donnees = $q->fetch()) {

				$o_annonceM = new AnnonceM($_donnees);

				array_push($_response, $o_annonceM);

			}

			return $_response;

		} catch (PDOException $e) {

			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';

		}

  }

	//------------------------------------------------------------
	// methods dedicated to pagination
	//------------------------------------------------------------

	/**
	* Retourne les 12 annonces suivants la page
	*/

	public static function getFollowingAnnonces($_indexPage){

		$db  = SPDO::getInstance();

		try {

			$_foot = 12*($_indexPage - 1);

			$_query = 'SELECT * FROM annonceM LIMIT 12 OFFSET '.$_foot.';';

			$q = $db->prepare($_query);

			$q->execute();

			$_response = array();

			while ($_donnees = $q->fetch(PDO::FETCH_ASSOC)) {

				$o_annonceM = new AnnonceM($_donnees);

				array_push($_response, $o_annonceM);

			}

			return $_response;

		} catch (PDOException $e) {

			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';

		}

	}

	/**
	* to return the object to a json
	*/

	public function toArray() {

		return array(

			'id' 							=> $this->id,

			'titre' 					=> $this->titre,

			'prix' 						=> $this->prix,

			'images' 					=> $this->images

		);

	}

	/**
	* to return number of pages
	*/

	public static function returnPageNumber() {

		$db  = SPDO::getInstance();

		try {

			$_query = ' SELECT COUNT(id) as total FROM annonceM; ';

			$q = $db->prepare($_query);

			$q->execute();

			$_result 		= $q->fetch(PDO::FETCH_ASSOC);

			$_nbAnnonce 	= $_result['total'];

			$_maxPage 		= ceil($_nbAnnonce/12);

			return $_maxPage;

		} catch (PDOException $e) {

			echo 'Error dans la classe ' .  __CLASS__ . '::' . __FUNCTION__ . '::' . $e->getMessage(),'error';

		}

	}


	//------------------------------------------------------------
	// end of methods dedicated to pagination
	//------------------------------------------------------------

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

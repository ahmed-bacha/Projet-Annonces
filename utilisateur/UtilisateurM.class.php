<?php  
	class UtilisateurM implements Model
	{
		private $id;
		private $nom;
		private $mdp;
		private $email; 

		/*-- constructeur ---------------------*/
		public function __construct($donnees){
			$this->hydrate($donnees);
			echo 'le model a ete cree<br /><br />';
		}

		/*-- hydrater objet -------------------*/
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

		/*Ajoute un utilisateur -------------*/
		public function ajoute($bdd){
		 	$q = $bdd->prepare('INSERT INTO UtilisateurM (nom, mdp, email) VALUES (:nom, :mdp, :email)');

		 	$q->bindValue(':nom', 	$this->nom);
		 	$q->bindValue(':mdp', 	$this->mdp);
		 	$q->bindValue(':email', $this->email);

		 	$q->execute();
		}

		/*-- retourner nom -------------------*/
		public function getNom(){
			return $this->nom;
		}

		/*-- retourner mot de passe ----------*/
		public function getMdp(){
			return $this->mdp;
		}

		/*-- retourner mail ------------------*/
		public function getEmail(){
			return $this->email;
		}

		/*-- modifier nom --------------------*/
		public function setNom($nom){
			$this->nom = $nom;
		}

		/*-- modifier mot de passe -----------*/
		public function setMdp($mdp){
			$this->mdp = $mdp;
		}

		/*-- modifier email ------------------*/
		public function setEmail($email){
			$this->email = $email;
		}
	}
?>
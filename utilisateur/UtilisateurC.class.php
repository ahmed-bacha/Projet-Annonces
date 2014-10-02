<?php 
	class UtilisateurC
	{
		private $bdd;

		function __construct($bdd)
		{
			$this->setBdd($bdd);
			echo 'le controleur a ete cree<br /><br />';
		}

		/*-- retourner bdd -------------------*/
		public function getBdd(){
			return $this->bdd;
		}

		/*-- modifier bdd --------------------*/
		public function setBdd($bdd){
			$this->bdd = $bdd;
		}

		/*-- ajouter utilisateur --------------*/
		function ajoute(UtilisateurM $UtilisateurM){
			$UtilisateurM->ajoute($this->getBdd());
			echo 'L\'utilisateur a bien ete ajoute<br /><br />';
		}
	}
?>
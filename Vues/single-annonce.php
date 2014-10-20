<?php 
require_once("../Utils/includeAll.php");

// On démarre la session 
session_start();


if (isset($_GET['id'])) {
    $utilisateurC = new UtilisateurC();
    $user = $utilisateurC->getUserById($_GET['id']);
     
    // On  crée les variables de session dans $_SESSION
    $_SESSION['id']    = $user->id;
    $_SESSION['email'] = $user->email;
    $_SESSION['nom']   = $user->nom;

}

?>


<!-- Header -->
<?php 

$title = "Exemple d'une annonce";
require_once("header.php");

 ?>

<!-- Page Content -->

<!-- ligne  -->
<div class="row col-lg-12">
	
	<!-- bloc annonce  -->
	<div class="col-lg-4">
		<div class="panel panel-success">

			<!-- titre annonce -->
			<div class="panel-heading panel-success">
				Titre de l'annonce ou du produit ...
				<br>
				13-10-2014 13:00
			</div>

			<!-- corps de l'annonce -->
			<div class="panel-body">
				<br>
				<div>
					<img class="img-thumbnail img-responsive" src="http://www.expertimmo.fr/Les-ISSAMBRES-Vente-appartement-vue-mer-PROGRAMME-NEUF-face-a-la-mer-Appartement-temoin_010167-A_3.JPG" alt="">
				</div>

				<div>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. </p>
					<hr>
					<!-- prix -->
					<button class="btn btn-primary btn-lg">599,00€</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fin bloc annonce  -->

	<!-- bloc annonce  -->
	<div class="col-lg-4">
		<div class="panel panel-success">

			<!-- titre annonce -->
			<div class="panel-heading panel-success">
				Titre de l'annonce ou du produit ...
				<br>
				13-10-2014 13:00
			</div>

			<!-- corps de l'annonce -->
			<div class="panel-body">
				<br>
				<div>
					<img class="img-thumbnail img-responsive" src="http://www.parisinfo.com/var/otcp/sites/images/media/1.-photos/80.-photos-sugar/hebergements/paris-attitude-appartement-5-630x405-c-otcp/5100042-1-fre-FR/Paris-Attitude-Appartement-5-630x405-C-OTCP_block_media_big.jpg" alt="">
				</div>

				<div>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. </p>
					<hr>
					<!-- prix -->
					<button class="btn btn-primary btn-lg">599,00€</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fin bloc annonce  -->

	<!-- bloc annonce  -->
	<div class="col-lg-4">
		<div class="panel panel-success">

			<!-- titre annonce -->
			<div class="panel-heading panel-success">
				Titre de l'annonce ou du produit ...
				<br>
				13-10-2014 13:00
			</div>

			<!-- corps de l'annonce -->
			<div class="panel-body">
				<br>
				<div>
					<img class="img-thumbnail img-responsive" src="http://www.cabinetvogue.com/wp-content/uploads/2009/04/appartement-a-vendre-nice.jpg" alt="">
				</div>

				<div>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. </p>
					<hr>
					<!-- prix -->
					<button class="btn btn-primary btn-lg">599,00€</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fin bloc annonce  -->
</div>
<!-- fin ligne  -->


<!-- Footer -->
<?php 
require_once("footer.php"); 
?>

<?php 

/*  
- Annonce C/M  : getAllAnnonces()
- Style sigle annonce
- Vues : liste-annonces.php
*/
require_once("../Utils/includeAll.php");




?>


<!-- Header -->
<?php 

$title = "Exemple d'une annonce";
require_once("header.php");

 ?>
 
<!-- Page Content -->

<!-- ligne  -->
<div class="row col-lg-12">

<?php 

$o_annonceC = new AnnonceC();
$tab_annonces = $o_annonceC->getAllAnnonces();

foreach ($tab_annonces as $value) {
?>
<!-- bloc annonce  -->
	<div class="col-lg-4">
		<div class="panel panel-success">

			<!-- titre annonce -->
			<div class="panel-heading panel-success">
				<?php 
				    echo $value[6];
			?>

			</div>

			<!-- corps de l'annonce -->
			<div class="panel-body">
				<br>
				<div>
					<img class="img-thumbnail img-responsive" src="http://www.expertimmo.fr/Les-ISSAMBRES-Vente-appartement-vue-mer-PROGRAMME-NEUF-face-a-la-mer-Appartement-temoin_010167-A_3.JPG" alt="">
				</div>

				<div>
					<p>
                        <?php 
						echo $value[8];
					?>
					</p>
					<hr>
					<!-- prix -->
					<button class="btn btn-primary btn-lg">
					<?php 
						echo $value[7];
					?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fin bloc annonce  -->

<?php  
}
?>


</div>
<!-- fin ligne  -->


<!-- Footer -->
<?php 
require_once("footer.php"); 
?>
<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['utilisateurM'])){
	$userM = $_SESSION['utilisateurM'];
}

?>


<!-- Header -->
<?php

$title = "Exemple d'une annonce";
require_once("header.php");

 ?>

<!-- Page Content -->

<?php

$o_annonceC 		= new AnnonceC();
$liste_annonces = $o_annonceC->getAllAnnonces();

$cp = 0;
?>

<!-- ligne  -->
<div class="row">

<?php
foreach($liste_annonces as $o_annonceM){
?>
			<!-- bloc annonce  -->
			<div class="col-lg-4 ">
				<div class="panel panel-success">

					<!-- titre annonce -->
					<div class="panel-heading panel-success">
						<p>
							<?php echo $o_annonceM->titre; ?>
						</p>
					</div>

					<!-- corps de l'annonce -->
					<div class="panel-body text-center">
						<br>

						<div style="min-height: 300px;max-height: 300px;">

							<?php

							$_images = $o_annonceC->deconcatImages($o_annonceM);

							if(!empty($_images)){

								if(count($_images) > 1){
								?>
								<img class="img-thumbnail img-responsive"  src= "<?php echo generateImageLink($_images[0]); ?>" alt="">
								<?php
								}else{
							?>
							<img class="img-thumbnail img-responsive"  src= "<?php echo generateImageLink($_images); ?>" alt="">
							<?php
								}
							}else{
							?>
								<img class="img-thumbnail img-responsive" src= "holder.js/300x300" alt="">
							<?php
							}
							?>
						</div>

						<hr>


						<!-- prix -->
							<button type="submit" name = "annonce" class="btn btn-primary btn-lg text-left" >
									<?php echo number_format($o_annonceM->prix, 2, ',', ' ')."€"; ?>
							</button >

							<a href="detail-annonce.php?idAnnonce=<?php echo $o_annonceM->id ?>" class="btn btn-primary btn-lg text-right">
								<span class="glyphicon glyphicon-arrow-right"></span>
								Voir
							</a>
					</div>
				</div>
			</div>
			<!-- fin bloc annonce  -->
<?php
	}
?>
</div>
<!-- Footer -->
<?php
require_once("footer.php");
?>

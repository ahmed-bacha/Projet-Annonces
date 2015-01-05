<?php

	//-------------------------
	// all classes loading
	//-------------------------

	require_once("../Utils/includeAll.php");

	//-------------------------
	// header inclusion
	//-------------------------

	$title = "Exemple d'une annonce";

	require_once("header.php");

	//-------------------------
	// get all anounces
	//-------------------------

	$o_annonceC 		= new AnnonceC();

	// $liste_annonces = $o_annonceC->getAllAnnonces();

?>

<!-- ligne  -->
<div class="row">

<?php

	$_currentIndex = 1;

	$liste_annonces = AnnonceM::getFollowingAnnonces($_currentIndex);

	foreach($liste_annonces as $o_annonceM){

?>
			<a href="detail-annonce.php?idAnnonce=<?php echo $o_annonceM->id ?>" >
				<!-- bloc annonce  -->
				<div class="col-lg-4 ">
					<div class="panel annonce-panel">

						<!-- titre annonce -->
						<div class="panel-heading annonce-heading">
							<span class="textCustom">
								<?php echo $o_annonceM->titre; ?>
							</span>
						</div>

						<!-- corps de l'annonce -->
						<div class="panel-body text-center annonce">
								<div class="announceBody">

								<?php

								$_images = $o_annonceC->deconcatImages($o_annonceM);

								if(!empty($_images)){

									$_firstNotNullImage = null;

									if(is_array($_images)){

										foreach ($_images as $_value){

											if(!empty($_value)){

												$_firstNotNullImage = $_value;

												break;

											}

										}

									}

									if(is_string($_images)){

										$_firstNotNullImage = $_images;

									}

								?>

								<img class="img-thumbnail img-responsive"  src= "<?php echo generateImageLink($_firstNotNullImage); ?>" alt="">

								<?php

								} else {

								?>

									<img class="img-thumbnail img-responsive"  src= "resources-img/noImage.jpg" alt="image">

								<?php

								}

								?>

								</div>

							<hr>

							<!-- prix -->

								<button type="submit" name = "annonce" class="btn panel-button btn-primary btn-lg text-left" >
										<?php echo number_format($o_annonceM->prix, 2, ',', ' ')."€"; ?>
								</button >

						</div>
					</div>
				</div>
				<!-- fin bloc annonce  -->
			</a>

<?php

	}

?>
		</div>
	</div>

	<nav role="navigation" class="text-center style-pagination">
		<ul class="pagination">
			<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li>
				<a href="#">
					<?php echo $_currentIndex ?>
				</a>
			</li>
			<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>

<script>

	$(function() {

		$('.annonce').hover(function() {

			var img = $(this).find('.img-thumbnail').css('opacity', '1.0');

			img.css('opacity', '1.0');

			img.hover(function() {

				$(this).css('opacity', '1.0');

			});

			$(this).mouseout(function() {

				$(this).find('.img-thumbnail').css('opacity', '0.7');

			});

		});

	});

</script>

<!-- Footer -->

<?php

require_once("footer.php");

?>

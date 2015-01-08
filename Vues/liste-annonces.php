<?php

	//-------------------------
	// all classes loading
	//-------------------------

	require_once("../Utils/includeAll.php");

	session_start();

	if(isset($_SESSION['utilisateurM'])){

		$userM = $_SESSION['utilisateurM'];

	}

	$_SESSION['currentIndex'] = 1;

	//-------------------------
	// header inclusion
	//-------------------------

	$title = "Exemple d'une annonce";

	require_once("header.php");

?>

		<div class="row">
			<div id="bloc-liste-annonces"></div>
		</div>
	</div>

	<nav role="navigation" class="text-center style-pagination">
		<ul class="pagination">
			<li>
				<a href="pagination-treatment.php?_distance=merger&_currentIndex=<?php echo $_SESSION['currentIndex'] ; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li>
				<a id="numero-page" href="#">
					<?php echo $_SESSION['currentIndex'] ?>
				</a>
			</li>
			<li>
				<a href="pagination-treatment.php?_distance=far&_currentIndex=<?php echo $_SESSION['currentIndex'] ; ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>

<script>

	//-------------------------------------
	// Effet sur les images
	//-------------------------------------

	$(function() {

		$('#numero-page').click(function(){

			$('body').animate({scrollTop:0}, 'slow');

			return false;

		});

		//-------------------------------------
		// function to activate a fontion
		//-------------------------------------

		$('#bloc-liste-annonces').empty();

		$.get( "pagination-treatment.php", function( data ) {

			var t_data = $.parseJSON(data);

			var numeroPage = t_data[0];

			var t_AnnonceData = t_data[1];

			for(var i in t_AnnonceData){

				var annonce = t_AnnonceData[i];

				$('#bloc-liste-annonces').append('<a href="detail-annonce.php?idAnnonce='+annonce['id']+'" >'+
																					'<div class="col-lg-4 ">'+
																						'<div class="panel annonce-panel">'+
																							'<div class="panel-heading annonce-heading">'+
																								'<span class="textCustom">'+
																									annonce['titre']+
																								'</span>'+
																							'</div>'+
																							'<div class="panel-body text-center annonce">'+
																							'<div class="announceBody">'+
																								'<img class="img-thumbnail img-responsive"  src="'+annonce['images']+'" alt="image">'+
																							'</div>'+
																							'<hr>'+
																							'<button type="submit" name = "annonce" class="btn panel-button btn-primary btn-lg text-left" >'+
																								annonce['prix']+" €"+
																							'</button >'+
																						'</div>'+
																					'</div>'+
																				'</div>'+
																			'</a>');

			}

			$('.pagination li:first-child').hide();

			var nbPage = t_data[2];

			if (numeroPage == nbPage) {

				$('.pagination li:last-child').hide();

			} else {

				$('.pagination li:last-child').show();

			}

		});

		//-------------------------------------
		// function to an effect on hover
		//-------------------------------------

		$('.annonce').hover( function() {

			var img = $(this).find('.img-thumbnail').css('opacity', '1.0');

			img.css('opacity', '1.0');

			img.hover(function() {

				$(this).css('opacity', '1.0');

			});

			$(this).mouseout(function() {

				$(this).find('.img-thumbnail').css('opacity', '0.7');

			});

		});

		//-------------------------------------
		// function whitch permit to assure the pagination treatment
		//-------------------------------------

		$('.pagination li:first-child a').click(function(){

			$('body').animate({scrollTop:0}, 'slow');

			$('#bloc-liste-annonces').empty();

			$.get( "pagination-treatment.php?_distance=merger", function( data ) {

				var t_data = $.parseJSON(data);

				var numeroPage = t_data[0];

				if (numeroPage == 1) {

					$('.pagination li:first-child').hide();

				} else {

					$('.pagination li:first-child').show();

				}

				$('#numero-page').empty().text(numeroPage);

				var t_AnnonceData = t_data[1];

				for(var i in t_AnnonceData){

					var annonce = t_AnnonceData[i];

					$('#bloc-liste-annonces').append('<a href="detail-annonce.php?idAnnonce='+annonce['id']+'" >'+
																						'<div class="col-lg-4 ">'+
																							'<div class="panel annonce-panel">'+
																								'<div class="panel-heading annonce-heading">'+
																									'<span class="textCustom">'+
																										annonce['titre']+
																									'</span>'+
																								'</div>'+
																							'<div class="panel-body text-center annonce">'+
																								'<div class="announceBody">'+
																									'<img class="img-thumbnail img-responsive"  src="'+annonce['images']+'" alt="image">'+
																								'</div>'+
																								'<hr>'+
																								'<button type="submit" name = "annonce" class="btn panel-button btn-primary btn-lg text-left" >'+
																									annonce['prix']+" €"+
																								'</button >'+
																							'</div>'+
																						'</div>'+
																					'</div>'+
																				'</a>');

				}

				// $('#bloc-liste-annonces').fadeIn();

				var nbPage = t_data[2];

				if (numeroPage == nbPage) {

					$('.pagination li:last-child').hide();

				} else {

					$('.pagination li:last-child').show();

				}

			});

			return false;

		});

		$('.pagination li:last-child a').click(function(){

			$('body').animate({scrollTop:0}, 'slow');

			$('#bloc-liste-annonces').empty();

			$.get( "pagination-treatment.php?_distance=far", function( data ) {

				var t_data = $.parseJSON(data);

				var numeroPage = t_data[0];

				if ( numeroPage == 1 ) {

					$('.pagination li:first-child').hide();

				} else {

					$('.pagination li:first-child').show();

				}

				$('#numero-page').empty().text(numeroPage);

				var t_AnnonceData = t_data[1];

				for(var i in t_AnnonceData){

					var annonce = t_AnnonceData[i];

					$('#bloc-liste-annonces').append('<a href="detail-annonce.php?idAnnonce='+annonce['id']+'" >'+
																						'<div class="col-lg-4 ">'+
																							'<div class="panel annonce-panel">'+
																								'<div class="panel-heading annonce-heading">'+
																									'<span class="textCustom">'+
																										annonce['titre']+
																									'</span>'+
																								'</div>'+
																								'<div class="panel-body text-center annonce">'+
																									'<div class="announceBody">'+
																										'<img class="img-thumbnail img-responsive"  src="'+annonce['images']+'" alt="image">'+
																									'</div>'+
																									'<hr>'+
																									'<button type="submit" name = "annonce" class="btn panel-button btn-primary btn-lg text-left" >'+
																										annonce['prix']+" €"+
																									'</button >'+
																								'</div>'+
																							'</div>'+
																						'</div>'+
																					'</a>');

				}

				var nbPage = t_data[2];

				if (numeroPage == nbPage) {

					$('.pagination li:last-child').hide();

				} else {

					$('.pagination li:last-child').show();

				}

			});

			return false;

		});

	});

</script>

<!-- Footer -->

<?php

require_once("footer.php");

?>

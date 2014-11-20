<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="row">
	<div class="col-lg-8">

		<div class="panel panel-success">

			<!-- titre annonce -->
			<div class="panel-heading panel-success text-center">
				Titre de l'annonce ou du produit ...
				<br>
				13-10-2014 13:00
			</div>



			<!-- corps de l'annonce -->
			<div class="panel-body text-center">
				<br>
				<div id="img">
					<a href="#"><img class="img-thumbnail img-responsive " src="http://www.expertimmo.fr/Les-ISSAMBRES-Vente-appartement-vue-mer-PROGRAMME-NEUF-face-a-la-mer-Appartement-temoin_010167-A_3.JPG" alt=""></a>
				</div>

				<br>
				<div class="row">
					<div id="img1" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<a href="#" onClick="click();"><img src="http://www.expertimmo.fr/Les-ISSAMBRES-Vente-appartement-vue-mer-PROGRAMME-NEUF-face-a-la-mer-Appartement-temoin_010167-A_3.JPG" data-src="holder.js/100x100" alt="..."> </a>
					    </div>
					</div>
					<div id="img2" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<a href="#"><img src="http://www.parisinfo.com/var/otcp/sites/images/media/1.-photos/80.-photos-sugar/hebergements/paris-attitude-appartement-5-630x405-c-otcp/5100042-1-fre-FR/Paris-Attitude-Appartement-5-630x405-C-OTCP_block_media_big.jpg" data-src="holder.js/100x100" alt="...">  </a>	
					    </div>
					</div>
					<div id="img3" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<a href="#"><img src="http://www.cabinetvogue.com/wp-content/uploads/2009/04/appartement-a-vendre-nice.jpg" data-src="holder.js/100x100" alt="..."></a>  	

					    </div>
					</div>
				</div>


				<!-- TEST SCRIPT -->
				<script>

					$(document).ready(function() {

					    $("#img1 a").click(function() {
					        //Do stuff when clicked
					        $("#img").html("<img class=\"img-thumbnail img-responsive \" src=\"http://www.expertimmo.fr/Les-ISSAMBRES-Vente-appartement-vue-mer-PROGRAMME-NEUF-face-a-la-mer-Appartement-temoin_010167-A_3.JPG\">");

						});

						$("#img2 a").click(function() {
					        //Do stuff when clicked
					        $("#img").html("<img class=\"img-thumbnail img-responsive \" src=\"http://www.parisinfo.com/var/otcp/sites/images/media/1.-photos/80.-photos-sugar/hebergements/paris-attitude-appartement-5-630x405-c-otcp/5100042-1-fre-FR/Paris-Attitude-Appartement-5-630x405-C-OTCP_block_media_big.jpg\">");

						});

						$("#img3 a").click(function() {
					        //Do stuff when clicked
					        $("#img").html("<img class=\"img-thumbnail img-responsive \" src=\"http://www.cabinetvogue.com/wp-content/uploads/2009/04/appartement-a-vendre-nice.jpg\">");

						});
					});

				</script>
				<!-- FIN TEST SCRIPT -->



				<br>
				<div>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ab a at soluta et accusamus maiores voluptatibus magni, possimus architecto saepe eligendi. Harum, quo nihil, doloremque sint quidem necessitatibus nulla. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, provident, cum. Error quia, fugit doloremque voluptates, delectus nobis illo in cum nesciunt earum modi officia incidunt, repellat pariatur, tempora maiores? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro amet, expedita quibusdam eaque, explicabo incidunt minus necessitatibus delectus ea blanditiis, velit est quam aliquid aliquam officiis? Ad, fugiat ipsam repellat.</p>
					<hr>
					<!-- prix -->
					<button class="btn btn-primary btn-lg">599,00€</button>
				</div>
			</div>
		</div>



	</div>
	<!-- fin bloc annonce  -->

		<!-- Block informations annonceur -->
	<div>
		<div class="col-lg-4">
			<div class="panel panel-success">

			<div class="panel-heading panel-success text-center">
				Informations 
				
			</div>

			<div class="input-group">
	      		<div class="input-group-addon">
	      			<span class="glyphicon glyphicon-envelope"></span>
	      			<a href="#">nassrehdfkhd@ggg.fr</a> 
	      		</div>
	      		<div class="input-group-addon">
	      			<span class="glyphicon glyphicon-phone-alt"></span>
	      			0678987635
	      		</div>
	      		
	    	</div>

			</div>
		</div>

	</div>

	


</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>
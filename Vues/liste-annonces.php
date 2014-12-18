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

$o_annonceC 	= new AnnonceC();
$tab_annonces = $o_annonceC->getAllAnnonces();
$k	= 0;

$size = intval(sizeof($tab_annonces)/3);
for($i=0; $i<$size+1; $i++){

?>
    <form role="form" method="POST" action="detail-annonce.php">
	<!-- ligne  -->
    <div class="row col-lg-12">
	<?php
			for( $j=$k; $j<$k+3;$j++)
			{
				if(!empty($tab_annonces[$j][6]))
				{
				?>
				<!-- bloc annonce  -->
			<div class="col-lg-4 ">
				<div class="panel panel-success">

					<!-- titre annonce -->
					<div class="panel-heading panel-success">
						<?php
						echo $tab_annonces[$j][6];
						?>
					</div>

					<!-- corps de l'annonce -->
					<div class="panel-body text-center">
						<br>
						<div>
							<?php

					$names_img = deconcatImages($tab_annonces[$j][9]);
					if (!empty($names_img))
					{

						if (sizeof($names_img) == 1)
						{

						 		$chemain_img="images/".$names_img;

							?>
								<img type="input" class="img-thumbnail img-responsive" src= "<?php echo $chemain_img; ?>" alt="">



					    	<?php
						}else {
	                          	$chemain_img="images/".$names_img[0];
							?>
								<img class="img-thumbnail img-responsive" src= "<?php echo $chemain_img; ?>" alt="">
	                <?php
						}
					}else {
						?>
						<img class="img-thumbnail img-responsive" src= "holder.js/300x300" alt="">
						<?php
					}

					     ?>
						</div>

						<div>
									<?php
							echo $tab_annonces[$j][8];
						?>
							<hr>
							<!-- prix -->

							<button type="submit" name = "annonce" class="btn btn-primary btn-lg"  value='<?php echo serialize($tab_annonces[$j]); ?>'>							<!-- <input type="hidden" name = "annonce" value="<?php  $j;?>"> -->
								<?php
							echo $tab_annonces[$j][7];
						?>
							</button >

						</div>
					</div>
				</div>
			</div>
			<!-- fin bloc annonce  -->
			<?php
			}
			}
		$k=$k+3;
?>
</div>
</form>
<?php
}
 ?>
<!-- Footer -->
<?php
require_once("footer.php");
?>

<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");

require_once("../Utils/includeAll.php");
 ?>


<?php 


// affichage du tableau des données
//var_dump($_POST);
//extract($_POST);

extract($_GET);


$o_annonceC = new AnnonceC();

$o_annonceM  = $o_annonceC->getAnnonceById($idAnnonce);


$o_utilisateurC = new utilisateurC();

$o_utilisateurM = $o_utilisateurC->getUserById($o_annonceM->idUtilisateur);


$names_img = $o_annonceC->deconcatImages($o_annonceM);

 ?>

<div class="row">
	<div class="col-lg-8">

		<div class="panel panel-success">
          
			<!-- titre annonce -->
			<div class="panel-heading panel-success text-center">
			   <?php echo $o_annonceM->titre  ?>
			</div>
				<!-- corps de l'annonce -->

			<div class="panel-body text-center">
				<?php  					
				     if (!empty($names_img))
				     {
				     	?>
						
						<div id="img">
							<?php  					
								if (sizeof($names_img) > 1)
									{
										?>
										<!-- l'image principale -->
										<img class="img-thumbnail img-responsive " src=" <?php echo "images/".$names_img[0] ?> " data-src="holder.js/100x100" alt="">
												
										<br>
										<div class="row">
                                            <?php
										       for ( $i=0; $i<3; $i++) 
										       {

										       		if (!empty($names_img[$i+1]))
				     							    {
									        ?>      
									               <br>
											       <!-- les autes images -->
											       <div id="img1" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					    						 		<div >
					      								<a href="#"><img class="img-thumbnail img-responsive " src=" <?php echo "images/".$names_img[$i+1] ?> " data-src="holder.js/100x100" alt=""></a>
												
					    								</div>
													</div>
												
							                         <?php 
                                       			    } 
                                                }

                                              

									} else  {
                                            ?>
                                            <!-- l'image principale -->
										<a href="#"><img class="img-thumbnail img-responsive " src=" <?php echo "images/".$names_img ?> " data-src="holder.js/100x100" alt=""></a>

									<?php
									       }
							       ?>

						                </div>	

						 </div>
                        
  


					<?php 
					}else {
							?>

						      <a href="#"><img class="img-thumbnail img-responsive " src="holder.js/300x300" alt=""></a>
						<?php 
					}
					?>
		
             		<br>
				     <div class="text-center">
					     <p>  <?php echo $o_annonceM->description ?>
					      <hr>
					     <!-- prix -->
					      <button class="btn btn-primary btn-lg"> <?php echo $o_annonceM->prix?> </button>
				     </div>

			</div>
	
      	    	

    </div>

     		<!-- Block informations annonceur -->
	
	<div class="col-lg-4">
			<div class="panel panel-success">

			<div class="panel-heading panel-success text-center">
				Informations 
				
			</div>
            
			<div class="input-group">
	      		<div class="input-group-addon">
	      			<?php echo $o_utilisateurM->nom; ?>
					&nbsp;
					&nbsp;
					&nbsp;
	      			<span class="glyphicon glyphicon-envelope"></span>
	      			<a href="#"><?php echo $o_utilisateurM->email ?></a> 
	      		</div>
	      		<div class="input-group-addon">
	      			<span class="glyphicon glyphicon-phone-alt"></span>
	      			<?php echo $o_annonceM->telephone ?>
	      		</div>
	      		
	    	</div>

			</div>
	</div>

</div>	

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>


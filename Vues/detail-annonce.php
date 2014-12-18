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

$details_annonce = unserialize($_POST['annonce']);

if(!empty($details_annonce))
	{

 		$names_img = deconcatImages($details_annonce[9]);
					
 ?>

<div class="row">
	<div class="col-lg-8">

		<div class="panel panel-success">
          
			<!-- titre annonce -->
			<div class="panel-heading panel-success text-center">
			   <?php echo  $details_annonce[6] ?>
			</div>
				<!-- corps de l'annonce -->

			<div class="panel-body text-center">
				<?php  					
				     if (!empty($names_img))
				     {
				     	?>
						<!-- l'image principale -->
						<div id="img">
							<?php  					
								if (sizeof($names_img) > 1)
									{
										?>
										<!-- les autres images -->
										<a href="#"><img class="img-thumbnail img-responsive " src=" <?php echo "images/".$names_img[0] ?> " data-src="holder.js/100x100" alt=""></a>
												
										<br>
										<div class="row">
                                            <?php
										       for ( $i=0; $i<3; $i++) 
										       {

										       		if (!empty($names_img[$i+1]))
				     							    {
									        ?>      
											       <!-- l'image principale -->
											       <div id="img1" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					    						 		<div class="thumbnail">
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
				     <div>
					     <p>  <?php echo $details_annonce[8] ?>
					      <hr>
					     <!-- prix -->
					      <button class="btn btn-primary btn-lg"> <?php echo $details_annonce[7] ?> </button>
				     </div>

			</div>
	
        </div>	    	

    </div>

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
<?php 
}
?>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>


<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="well">
	<p>Hello world</p>


	<form method="post" action="traitement-image.php" enctype="multipart/form-data">
	     <input type="file" name="icone" id="icone" /><br />
	     <input type="hidden" name="MAX_FILE_SIZE" value="5048576" />
	     <input type="submit" name="submit" value="Envoyer" />
	</form>



</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>
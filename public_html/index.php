<?php
include("../resources/config.php");

$page_title = "Insert " . ucfirst($file_beam_item);

include("../resources/templates/header.php");
?>

<main>

<form action="beam.php" method="post" enctype="multipart/form-data">
	<p>
        	<input type="text" placeholder="Filename (Blank for uploaded name)" 
			name="desired_filename" class="basic-text">
	</p>

	<p>
		<input type="text" placeholder="Source (Optional)"
			name="file_source" class="basic-text">
	</p>

	<input type="file" name="fileToUpload" id="fileToUpload" style="margin: 0 auto">
	<input style="margin-top: 10px; margin-bottom: 10px" type="submit"
		value="INSERT <?php echo(strtoupper($file_beam_item)); ?>" name="submit">
</form>

<img alt="<?php echo($file_beam_alt); ?>" src="<?php echo($file_beam_img); ?>">

</main>

<?php include("../resources/templates/footer.html");?>

<?php
$page_title = "Create Mask";

include("../resources/config.php");
include("../resources/templates/header.php");
?>


<main>

<form action="conjure.php" method="post" enctype="multipart/form-data">
	<p>
        	<input type="text" placeholder="URL"
			name="url_target" class="basic-text">
	</p>

	<p>
		<input type="text" placeholder="Alias (Shortened URL)"
			name="url_alias" class="basic-text">
	</p>

	<input style="margin-top: 10px; margin-bottom: 10px" type="submit"
		value="FORGE <?php echo(strtoupper($url_aliasize_item)); ?>" name="submit">
</form>

<img alt="<?php echo($url_aliasize_alt); ?>" src="<?php echo($url_aliasize_img); ?>">


</main>

<?php include("../resources/templates/footer.html");?>

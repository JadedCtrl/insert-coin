<?php include("header.html");?>

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

<!--	<p>
        	<input type="text" placeholder="Upload from URL" 
			name="upload_url" id="upload_url" style="width: 400px;">
	</p> -->

	<input type="file" name="fileToUpload" id="fileToUpload" style="margin: 0 auto">
	<input style="margin-top: 10px; margin-bottom: 10px" type="submit" value="INSERT COIN" name="submit">
</form>

<img alt="Picture of a pretty big, yellow labour-token." src="res/img/insertcoin_big.png">

</main>

<?php include("footer.html");?>

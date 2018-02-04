<?php include("header.html");?>

<main class="text-center" style="margin-top: 30px">
<form action="beamgit.php" method="post" enctype="multipart/form-data">
	<p>
        	<input type="text" placeholder="Filename (Blank for uploaded name)" 
			name="desired_filename" id="desired_filename" style="width: 400px;">
	</p>

	<p>
		<input type="text" placeholder="Description (Optional)"
			name="file_desc" id="file_desc" style="width: 400px;">
		<input type="text" placeholder="Source (Optional)"
			name="file_source" id="file_source" style="width: 400px;">
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

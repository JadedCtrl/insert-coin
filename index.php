<?php include("header.html");?>

<center style="margin-top: 30px">
<form action="beam.php" method="post" enctype="multipart/form-data">
	<p>
        	<input type="text" placeholder="Filename (Blank for uploaded name)" 
			name="desired_filename" id="desired_filename" style="width: 400px;">
	</p>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input style="margin-top: 10px; margin-bottom: 10px" type="submit" value="INSERT COIN" name="submit">
</form>

<img src="../../res/img/insertcoin_big.png">

<?php include("footer.html");?>

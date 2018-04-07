<?php include("header.html");?>

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

	<input style="margin-top: 10px; margin-bottom: 10px" type="submit" value="INSERT COIN" name="submit">
</form>

<img alt="Picture of a pretty big, yellow labour-token." src="res/img/insertcoin_big.png">

</main>

<?php include("footer.html");?>

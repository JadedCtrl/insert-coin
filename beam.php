<?php

include("header.html");
echo "<main class=\"text-center\">";

if (empty($_POST["desired_filename"]))
{
	$file_name = $_FILES["fileToUpload"]["name"];
}
else
{
	$file_name = $_POST["desired_filename"];
}


// check if file-name has any... undesirable characteristics

if (strstr($file_name, " "))
{
	$file_name = str_replace(" ", "_", $file_name);
}

if (strstr($file_name, ".."))
{
	$file_name = str_replace("..", "_", $file_name);
}

if (strstr($file_name, "/"))
{
	$file_name = str_replace("/", "_", $file_name);
}


// and now we pretend that never happened

$dest_dir = "p/";
$dest_file = $dest_dir . $file_name;

$beaming_permitted = 1;

if (file_exists($dest_file))
{
	echo "<p class=\"uppercase\">We're getting some interference</p>";
	echo "<p class=\"uppercase\">Please use a different coin-name</p>";
	$beaming_permitted = 0;	
}
elseif ($_FILES["fileToUpload"]["size"] > 50000000)
{
	echo "<p class=\"uppercase\">This coin will be up for at least three months</p>";
	echo "<p class=\"uppercase\">7 moons in the ordinary sabbatical cycle</p>";
	echo "<p class=\"uppercase\">After that, it *may* be de-atomized</p>";
}
elseif ($_FILES["fileToUpload"]["size"] < 25000000)
{
	echo "<p class=\"uppercase\">Thank you for feeding me</p>";
	echo "<p class=\"uppercase\">Your coin is in safe hands</p>";
	echo "<p class=\"uppercase\">It will not be de-atomized for at least a year</p>";
}


if ($beaming_permitted == 0) {
	echo "<title>COIN ON FIRE</title>";
	echo "<img alt=\"A big coin in bloody flames.\" src=../../res/img/coinfire_big.png>";
	echo "<p>sorry <\\3</p>";
}
else  {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$dest_file)) {
		echo "<title>COIN INSERTED <3</title>";
		echo "<img alt=\"A coin lovingly inserted to a coin-slot\" src=../../res/img/coininserted_big.png>";
		echo "<p class=\"uppercase\">It is <a href=" . $dest_file . ">here</a></p>";
	}
	else
	{
		echo "<title>COIN ON FIRE</title>";
		echo "<img alt=\"Ouch, that coin is on fire. Literally.\" src=../../res/img/coinfire_big.png>";
		echo "<p>...</p>";
		echo "<p class=\"uppercase\">That was weird, something went wrong. Try again.</p>";
	}
}

?>

</main>

<?php
include("footer.html");
?>

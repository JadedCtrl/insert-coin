<?php

include("header.html");
echo "<center>";

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
	echo "<p>WE'RE GETTING SOME INTERFERENCE</p>";
	echo "<p>PLEASE USE A DIFFERENT COIN-NAME</p>";
	$beaming_permitted = 0;	
}
elseif ($_FILES["fileToUpload"]["size"] > 50000000)
{
	echo "<p>THIS COIN WILL BE UP FOR AT LEAST THREE MONTHS</p>";
	echo "<p>7 MOONS IN THE ORDINARY SABBATICAL CYCLE</p>";
	echo "<p>AFTER THAT, IT *MAY* BE DE-ATOMIZED</p>>";
}
elseif ($_FILES["fileToUpload"]["size"] < 25000000)
{
	echo "<p>THANK YOU FOR FEEDING ME</p>";
	echo "<p>YOUR COIN IS IN SAFE HANDS</p>";
	echo "<p>IT WILL NOT BE DE-ATOMIZED FOR AT LEAST A YEAR</p>";
}


if ($beaming_permitted == 0) {
	echo "<img src=../../res/img/coinfire_big.png>";
	echo "<p>sorry <\\3</p>";
	echo "<title>COIN ON FIRE</title>";
}
else  {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$dest_file)) {
		echo "<img src=../../res/img/coininserted_big.png>";
		echo "<p>IT IS <a href=" . $dest_file . ">HERE</a></p>";
		echo "<title>COIN INSERTED <3</title>";
	}
	else
	{
		echo "<img src=../../res/img/coinfire_big.png>";
		echo "<p>...</p>";
		echo "<p>THAT WAS WEIRD, SOMETHING WENT WRONG. TRY AGAIN.</p>";
		echo "<title>COIN ON FIRE</title>";
	}
}

include("footer.html");

?>
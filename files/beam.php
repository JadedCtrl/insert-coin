<html>
<head>

<!-- THIS ENTIRE FILE IS UNDER THE GNU AGPLv3+
    https://www.gnu.org/licenses/agpl-3.0.html -->

<link rel="stylesheet" type="text/css" href="../../res/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../res/style.css">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/connection" type="text/css"/>
</head>

<body style="font-family: 'ConnectionRegular'; font-weight: normal; font-style: normal;">
<div class="row text-center">
	<a href="../mazes/">
	<div class="col-md-4 col-lg-4" id="sectiona">
		<h1>ihatemazes</h1>
	</div>
	</a>

	<a href="../naia/">
	<div class="col-md-4 col-lg-4" id="sectionb">
		<h1>naia</h1>
	</div>
	</a>

	<a href="../files/">
	<div class="col-md-4 col-lg-4" id="sectionc">
		<h1>image-file_upload</h1>
	</div>
	</a>
</div>

<center style="margin-top: 30px">


<?php

// check if file-name has any... undesirable characteristics

$file_name = basename($_FILES["fileToUpload"]["name"]);

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
	echo "<img src=../img/coinfire_big.png>";
	echo "<p>sorry <\\3</p>";
}
else  {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$dest_file)) {
		echo "<img src=../img/coininserted_big.png>";
		echo "<p>IT IS <a href=" . $dest_file . ">HERE</a></p>";
	}
	else
	{
		echo "<img src=../img/coinfire_big.png>";
		echo "<p>...</p>";
		echo "<p>THAT WAS WEIRD, SOMETHING WENT WRONG. TRY AGAIN.</p>";
	}
}

?>

</center>
</body>
</html>

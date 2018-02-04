<?php 

include("lib.php");

include("header.html");
echo("\n<main class=\"text-center\">\n");

function celebrate($dest_file)
{

?>
	<p class="uppercase">Thank you for feeding me</p>
	<p class="uppercase">Your coin is in safe hands</p>
	<p class="uppercase">It will not be de-atomized for at least a year</p>

	<title>COIN INSERTED <3</title>

	<img alt="A coin lovingly inserted to a coin-slot" src=res/img/coininserted_big.png>

	<p class="uppercase">Your coin's <a href="<?php echo($dest_file); ?>">over here</a></p>
	<p class="uppercase"><a href="<?php echo($dest_file); ?>">
		https://coinsh.red/<?php echo($dest_file); ?></a></p>
	<p class="uppercase">It's meta-stuff (or lack thereof) is 
		<a href="<?php echo($dest_file); ?>.txt\">here</a></p>
<?php
}

function celebrate_death($dest_file, $upload_method)
{
?>
	<title>COIN ON FIRE</title>
	<img alt="Ouch, that coin's on fire. Literally." src="res/img/coinfire_big.png">
	<p>...</p>
	<p class="uppercase">That was weird, something went wrong.</p>
	<p class="uppercase">Give it another go-- if it happens again, tell me.<p>
	<p class="uppercase">Also tell this: "File: <?php echo($dest_file); ?>,
		Method: <?php echo($upload_method); ?>."</p>

<?php
}
	


if (!empty($_POST["upload_url"]))
{
	$upload_url = $_POST["upload_url"];
	$file_name = url_to_filename($upload_url);
	$upload_method = 2;
}
else if (!empty($_POST["desired_filename"]))
{
	$file_name = $_POST["desired_filename"];
	$upload_method = 1;
}
else if (!empty($_FILES["fileToUpload"]["name"]))
{
	$file_name = $_FILES["fileToUpload"]["name"];
	$upload_method = 1;
}
else
{
	$upload_method = 0;
}


// check if file-name has any... undesirable characteristics
$file_name = sanitize_filename($file_name);


// and now we pretend that never happened


$dest_dir = "p/";
$dest_file = $dest_dir . $file_name;


$beaming_permitted = 1;

if (file_exists($dest_file))
{
	echo("\t<p class=\"uppercase\">We're getting some interference</p>\n");
	echo("\t<p class=\"uppercase\">Please use a different coin-name</p>\n\n");
	$beaming_permitted = 0;	
}

if ($beaming_permitted == 0)
{
	echo("\t<title>COIN ON FIRE</title>\n\n");
	echo("\t<img alt=\"A big coin in bloody flames.\" src=res/img/coinfire_big.png>\n");
	echo("\t<p>sorry <\\3</p>\n");
}
else  
{
	if ($upload_method == 1)
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$dest_file))
		{
			write_metadata($dest_file, $_POST["file_desc"], $_POST["file_source"]);
			celebrate($dest_file);
		}
		else
		{
			celebrate_death($dest_file, $upload_method);
		}
	}
	else if ($upload_method == 2)
	{
		$download = file_get_contents($upload_url);
		if (file_put_contents($dest_file, $download))
		{
			write_metadata($dest_file, $_POST["file_desc"], $upload_url . "\n\t" . $_POST["file_source"]);
			celebrate($dest_file);
		}
		else
		{
			celebrate_death($dest_file, $upload_method);
		}
	}
	else if ($upload_method == 0)
	{
		echo("\t<p class=\"uppercase\">(upload something next time, my dumb, sweet honey-pie <3)<p>");
		celebrate_death("n/a", "smartassery");
	}
	else
	{
		celebrate_death($dest_file, $upload_method);
	}
}
		


?>

</main>

<?php
include("footer.html");
?>

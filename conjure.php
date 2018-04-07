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

	<img alt="A coin lovingly inserted to a coin-slot" src="res/img/coininserted_big.png">

	<p class="uppercase">Your coin's <a href="<?php echo($dest_file); ?>">over here</a></p>
	<p class="uppercase"><a href="<?php echo($dest_file); ?>">
		https://coinsh.red/<?php echo($dest_file); ?></a></p>
	<p class="uppercase">It's meta-stuff (or lack thereof) is 
		<a href="<?php echo($dest_file); ?>.txt">here</a></p>
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
	


if (!empty($_POST["url_target"]) && !empty($_POST["url_alias"]))
{
	$url_target = $_POST["url_target"];
	$url_alias = $_POST["url_alias"];
	$beaming_permitted = 1;
}
else
{
	$beaming_permitted = 0;
}


// check if file-name has any... undesirable characteristics
$url_alias = sanitize_filename($url_alias);


// and now we pretend that never happened

$dest_dir = "u/";
$dest_file = $dest_dir . $url_alias;



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
	$redirectfile = fopen($dest_file, 'w');

	fwrite($redirectfile, "<?php header('Location: " . $url_target . "'); ?>");
	fclose($redirectfile);

	celebrate($dest_file);
}

?>

</main>

<?php
include("footer.html");
?>

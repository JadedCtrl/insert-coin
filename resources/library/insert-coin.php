<?php

include("../config.php");

function celebrate($dest_file, $item_type, $image_url, $image_alt, $meta_data = false)
{

?>
	<title><?php echo($site_name . ": " . $item_type); ?> inserted <3</title>
	<p>Thanks for feeding me</p>
	<p>Your <?php echo($item_type); ?>'s in safe hands</p>

	<img alt="<?php echo($image_alt); ?>" src="<?php echo($image_url); ?>">

	<p>Your <?php echo($item_type); ?>'s
		<a href="<?php echo ($dest_file); ?>">over here</a></p>
	<p><b><?php echo("https://" . get_cwd($_SERVER["REQUEST_URI"]) . "/" . $dest_file); ?></b></p>
<?php
	if ($meta_data) {
?>
	<p>It's meta-stuff (or lack thereof) is
		<a href="<?php echo($dest_file); ?>.txt">here</a></p>
<?php
	}
}


function celebrate_death($dest_file, $item_type, $image_url, $image_alt, $message)
{

?>
	<title><?php echo($site_name . ": " . $item_type); ?> burned </3</title>
	<p>Oh God, I've never seen so much blood—</p>
	<p>err, I mean, there're just some minor problems under the hood!</p>

	<img alt="<?php echo($image_alt); ?>" src="<?php echo($image_url); ?>">

	<?php echo($message); ?>

<?php
}

<?php 
$page_title = "The Conjuring";

include("../resources/config.php");
include("../resources/library/insert-coin.php");

include("../resources/templates/header.php");
echo("\n<main>\n");


if (!empty($_POST["url_target"]) && !empty($_POST["url_alias"]))
{
	$url_target = $_POST["url_target"];
	$url_alias = $_POST["url_alias"];
	$url_alias = sanitize_filename($url_alias);

	$visible_dest = $url_aliasize_dir . $url_alias . $url_aliasize_visible_suffix;
	$dest_file = $url_aliasize_dir . $url_alias . $url_aliasize_suffix;

	$beaming_permitted = 0;
}
else
{
	$beaming_permitted = 1;
}

if (!filter_var($url_target, FILTER_VALIDATE_URL))
{
	$beaming_permitted = 3;
}
else if (file_exists($dest_file))
{
	$beaming_permitted = 2;
}


switch ($beaming_permitted)
{
	case 1:
		celebrate_death($dest_file, $url_aliasize_item,
			$url_aliasize_die_img, $url_aliasize_die_alt,
		"<p>... you didn't pick a URL/target.</p>
		<p>Do it next time >;c</p>");
		break;
	case 2:
		celebrate_death($dest_file, $url_aliasize_item,
			$url_aliasize_die_img, $url_aliasize_die_alt,
		"<p>Oh, sorry. Some-one just took that mask before you got here!</p>
		<p>Try a different target name, doggo</p>");
		break;
	case 3:
		celebrate_death($dest_file, $url_aliasize_item,
			$url_aliasize_die_img, $url_aliasize_die_alt,
		"<p>Are you screwing with me? That's not a URL</p>
		<p>Nice try, buck-o</p>");
		break;
	case 0:
		write_alias($dest_file, $url_target);
		celebrate($visible_dest, $url_aliasize_item,
			$url_aliasize_win_img, $url_aliasize_win_alt);
		break;
}

?>

</main>

<?php
include("../resources/templates/footer.html");
?>

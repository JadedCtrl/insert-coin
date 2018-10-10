<?php 

include("../../resources/config.php");
include("../../resources/library/main.php");


$url_target = $_POST["url_target"];
$url_alias = sanitize_filename($_POST["url_alias"]);

$visible_name = $url_alias . $GLOBALS["url_aliasize_visible_suffix"];
$visible_dest = $GLOBALS["url_aliasize_dir"] . $visible_name;
$dest_name = $GLOBALS["url_aliasize_dir"] . $url_alias
		. $GLOBALS["url_aliasize_suffix"];
$dest_file = root("public_html/" . $dest_name);


switch (true) {
	case (empty($url_target) || empty($url_alias)):
		redirect(make_url("result/create.php?error=1"));
		break;
	case (file_exists($dest_file)):
		redirect(make_url("result/create.php?error=2"));
		break;
	case (!valid_url($url_target)):
		redirect(make_url("result/create.php?error=3"));
		break;

	case (write_alias($dest_file, $url_target)):
		redirect(make_url("result/create.php?success="
				. $visible_name));
		break;

	default:
		redirect(make_url("result/create.php"));
		break;
}

?>

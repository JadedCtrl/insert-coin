<?php
include("../../resources/config.php");
include("../../resources/library/main.php");

$item = strtolower($GLOBALS["url_aliasize_item"]);

$filename = sanitize_filename($_GET["success"]);
$error = sanitize_filename($_GET["error"]);



switch (true) {
	case (!empty($filename)):
		$mask_url = make_url($GLOBALS["url_aliasize_dir"] . $filename);

		create_page("happy " . $item, "mask/celebrate.php",
			$GLOBALS["url_aliasize_win_alt"],
			$GLOBALS["url_aliasize_win_img"]);
		break;
	case ($error == 1):
			create_page($item . " on fire",
				"mask/death-1.html",
				$GLOBALS["url_aliasize_die_alt"],
				$GLOBALS["url_aliasize_die_img"]);
			break;
	case ($error == 2):
			create_page($item . " on fire",
				"mask/death-2.php",
				$GLOBALS["url_aliasize_die_alt"],
				$GLOBALS["url_aliasize_die_img"]);
			break;
	case ($error == 3):
			create_page($item . " on fire",
				"mask/death-3.html",
				$GLOBALS["url_aliasize_die_alt"],
				$GLOBALS["url_aliasize_die_img"]);
			break;
	default:
			create_page($item . " on fire",
				"mask/death.html",
				$GLOBALS["url_aliasize_die_alt"],
				$GLOBALS["url_aliasize_die_img"]);
			break;
}

?>

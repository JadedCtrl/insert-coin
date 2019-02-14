<?php
include("../res/config.php");
include("../res/library/main.php");

$item = strtolower($GLOBALS["file_beam_item"]);

$filename = sanitize_filename($_GET["success"]);
$error = sanitize_filename($_GET["error"]);



switch (true) {
	case (!empty($filename)):
		$coin_url = make_url($GLOBALS["file_beam_dir"] . $filename);

		create_page("happy " . $item, "coin/celebrate.php",
			$file_beam_win_alt, $file_beam_win_img);
		break;
	case ($error == 1):
			create_page($item . " on fire",
				"coin/death-1.html",
				$file_beam_die_alt, $file_beam_die_img);
			break;
	case ($error == 2):
			create_page($item . " on fire",
				"coin/death-2.html",
				$file_beam_die_alt, $file_beam_die_img);
			break;
	default:
			create_page($item . " on fire",
				"coin/death.html",
				$file_beam_die_alt, $file_beam_die_img);
			break;
}

?>

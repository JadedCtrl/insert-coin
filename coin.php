<?php
include("res/config.php");
include("res/library/main.php");

create_page("insert " . strtolower($GLOBALS["file_beam_item"]), "coin/beam.php",
		$GLOBALS["file_beam_alt"], $GLOBALS["file_beam_img"]);

?>

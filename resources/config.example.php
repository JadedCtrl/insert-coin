<?php

//
// This file contains some global configuration you might wanna do
//

$site_name = "insert-coin";	// what the site will be called
$root_name = "insert-coin";	// the directory containing this instance



// vars related to URL shortening

$url_aliasize_img = "/res/img/mask-big.png";
$url_aliasize_alt = "A mask, floating in mid-air.";
$url_aliasize_win_img = "/res/img/mask_win-big.png";
$url_aliasize_win_alt = "A whimsical mask sparkling.";
$url_aliasize_die_img = "/res/img/mask_die-big.png";
$url_aliasize_die_alt = "A whimsical mask on fire.";

$url_aliasize_item = "mask";	// what the alias is affectionately called
$url_aliasize_dir = "u/";	// where the redirects go
$url_aliasize_visible_suffix = ".php";	// suffix visible in redirect links
$url_aliasize_suffix = ".php";	// actual suffix in redirect links
				// (the distinction is important if you use
				// URL rewriting for the /u/ folder or
				//something


// vars related to file uploading

$file_beam_img = "/res/img/coin-big.png";
$file_beam_alt = "A big & yellow coin lying before a coin-slot";
$file_beam_win_img = "/res/img/coin_win-big.png";
$file_beam_win_alt = "A coin inserted into a coin slot.";
$file_beam_die_img = "/res/img/coin_die-big.png";
$file_beam_die_alt = "A coin on fire.";

$file_beam_item = "coin";	// what the file is affectionately called
$file_beam_dir = "p/";		// where the files go


// for sanitization of images (stripping EXIF, etc) with an external program.
$image_sanitize_command = "mogrify";
$image_sanitize_args = "-strip";

?>

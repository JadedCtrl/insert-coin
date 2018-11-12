<?php


// FILENAME --> SAFE_FILENAME_STRING
//	Sanitize a filename by replacing common suspicious characters with "_".
function sanitize_filename($filename)
{
	$death_characters = array(" ", ",", "<", ">", "/", "\\", "\"", "\'",
				"%", "$", "^");
	$death_filetypes = array(".php", ".sh", ".lisp", ".cl", ".cgi", ".pl");

	$sanitized_filename = str_replace($death_characters, "_", $filename);
	$sanitized_filename = str_replace($death_filetypes, ".inv",
						$sanitized_filename);

	return $sanitized_filename;
}



// IMAGE_PATH --> IMAGE_PATH
//	Sanitize an image (EXIF, etc) with external program from config.php
function sanitize_image($path)
{
	exec($image_sanitize_command . $image_sanitize_args . $path, $result);

	return $path;
}

?>

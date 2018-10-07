<?php

// URL --> FILENAME_AT_END_OF_URL
//	Return the filename of a URL.
function url_to_filename($url)
{
	return last(explode('/', $url));
}



// ??? --> ???
//	???
function get_cwd($url)
{
	$url_array = (explode("/", $url));
	
	if (end($url_array)) {
		$parts = count($url_array);

		$url = $_SERVER["HTTP_HOST"] . implode(array_splice($url_array, 1, $parts - 2));

		return $url;
	}
	else {
		return $url;
	}
}

?>

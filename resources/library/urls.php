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



// --> PROTOCOL://
//	Return "http://" or "https://", depending on what's currently used.
function protocol()
{
        if (isset($_SERVER['HTTPS'])) {
                return "https://";
        } else {
                return "http://";
        }
}



// ABSOLUTE_PATH --> FULL_URL
//	Create a full URL with the current protocol, domain, and provided path.
function make_url($path)
{
        $url = protocol()
                . $_SERVER['HTTP_HOST']
                . "/"
                . $path;

        return $url;
}



// URL --> HEADER_REDIRECTION
//	Create a redirection header.
function redirect($url)
{
	return header('Location: ' . $url);
}



// URL --> BOOLEAN
// 	Return whether or not a URL is a valid one.
function valid_url($url)
{
	return filter_var($url, FILTER_VALIDATE_URL);
}

?>

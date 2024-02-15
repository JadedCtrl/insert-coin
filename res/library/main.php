<?php


// PROJECT_ROOTDIR_NAME --> ABSOLUTE_PATH_TO_PROJECT_DIR
//	Return the absolute path to the project's root.
function get_project_root()
{
	return preg_replace("%" . $GLOBALS["root"] . ".*" . "%",
				$GLOBALS["root"] . "/",
				getcwd());
}

// PATH_RELATIVE_TO_PROJECT_ROOT --> ABSOLUTE_PATH
//	Return the absolute path to something within the project's root.
function root($path)
{
	$absolute_path = get_project_root() . $path;
	return $absolute_path;
}

// PATH_RELATIVE_TO_PROJECT_ROOT --> PATH_RELATIVE_TO_WEB_ROOT
//	Return the absolute path to something within the project's root.
function webroot($path)
{
	return $GLOBALS['webroot'] . $path;
}

include(root("res/library/array.php"));
include(root("res/library/file.php"));
include(root("res/library/insert-coin.php"));
include(root("res/library/sanitization.php"));
include(root("res/library/string.php"));
include(root("res/library/urls.php"));

?>

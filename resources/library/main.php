<?php


// PROJECT_ROOTDIR_NAME --> ABSOLUTE_PATH_TO_PROJECT_DIR
//	Return the absolute path to the project's root.
function get_project_root()
{
	return preg_replace("%" . $GLOBALS["root_name"] . ".*" . "%",
				$GLOBALS["root_name"] . "/",
				getcwd());
}

// PATH_RELATIVE_TO_PROJECT_ROOT --> ABSOLUTE_PATH
//	Return the absolute path to something within the project's root.
function root($path)
{
	$absolute_path = get_project_root() . $path;
	return $absolute_path;
}

include(root("resources/library/array.php"));
include(root("resources/library/file.php"));
include(root("resources/library/insert-coin.php"));
include(root("resources/library/sanitization.php"));
include(root("resources/library/string.php"));
include(root("resources/library/urls.php"));

?>

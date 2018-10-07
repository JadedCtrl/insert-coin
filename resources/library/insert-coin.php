<?php

include("../config.php");

// FILEPATH URL --> RELATIVE_PATH
// SIDE-EFFECT: Written redirect PHP to filepath
//	Create a simple PHP redirection file at $filepath to $url;
//	return the relative path to it.
function write_alias($filepath, $url)
{
	$file_p = fopen($filepath, 'w');
		
	fwrite($file_p, "<?php header('Location: " . $url . "'); ?>\n");
	fclose($file_p);

	return $filepath;
}



// FILEPATH SOURCE_STRING --> RELATIVE_PATH
// SIDE-EFFECT: Written metadata TXT at $filepath.txt
//	Create a metadata file for set path;
//	return the relative path to it.
function write_metadata($filepath, $source)
{
	if (empty($source)) {
		$source = "[citation needed]";
	}

	$file_p = fopen($filepath . ".txt", 'w');
	$source_string = "Source:\n"
		. prefix_text(set_line_length($source, 60),
				"                    ");

	fwrite($file_p, $source_string);
	fclose($file_p);
}



// TEXT STRING_PREFIX --> TEXT_STARTING_WITH_PREFIX
//	Places $prefix at the start of every line in $text.
function prefix_text($text, $prefix)
{
	$separator = "\r\n";
	$line = strtok($text, $separator);
	$prefixed_text="";

	while ($line !== false) {
		$prefixed_text=$prefixed_text . $prefix . $line . "\n";
		$line = strtok($separator);
	}

	return $prefixed_text;
}



// STRING COLUMN_SIZE_NUMBER --> TEXT_FORMATTED_TO_SIZED_LINES
//	Turns all lines in a string into, at the max, sized at $column_size
//	Perfect for consistent formatting <3
function set_line_length($original, $line_width)
{
	$text_len = strlen($original) - 1;
	$line_width = $line_width - 1;

	$resized = [];
	$new_line = true;

	if ($text_len + 1 == 0) {
		return 0;
	}

	// j is the index for $resized, the string deriving from $text
	// they will both be different sizes, and so need different indexes
	$j = 0;

	for($i = 0; $i <= $text_len; $i++) {
		$cur_character = substr($original, $i, 1);

		if ($i % $line_width == 0 && $i != 0) {
			// if not in middle of word, just start a newline
			// otherwise, hypenate the word across a newline
			if ($cur_character == ' ') {
				$resized[$j] = "\n";
				$j++;
			}
			else if (is_punctuation($cur_character)) {
				$resized[$j] = "$cur_character";
				$resized[$j + 1] = "\n";
				$j++;
			}
			else {
				
				$resized[$j] = "-";
				$resized[$j + 1] = "\n";
				$resized[$j + 2] = $original[$i];
				$j += 2;
			}

			$new_line = true;
		}
		else {
			if ($new_line == true && $cur_character == ' ') {
			}
			else {
				$resized[$j] = $original[$i];
			}

			$new_line = false;
		}
		
		$j++;
	}
	
	return implode($resized);
}



// CHARACTER --> BOOLEAN
//	Check whether or not a character is punctuation.
function is_punctuation($character)
{
	$punctuations = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")",
				"[", "{", "}", "]", "`", "~", ";", ":", "'",
				"\"", ",", ".", "<", ">", "/", "?");

	return in_array($character, $punctuations);
}



// FILENAME --> SAFE_FILENAME_STRING
//	Sanitize a filename by replacing common suspicious characters with "_".
function sanitize_filename($filename)
{
	$death_characters = array(" ", ",", "/", "\\", "%", "$", "^");

	$sanitized_filename = str_replace($death_characters, "_", $filename);

	return $sanitized_filename;
}



// ARRAY --> LAST_ELEMENT_OF_ARRAY
//	Get the last element in an array.
function last($array)
{
	$array[count($array) - 1];
}



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



// IMAGE_PATH --> IMAGE_PATH
//	Sanitize an image (EXIF, etc) with external program from config.php
function sanitize_image($path)
{
	exec($image_sanitize_command . $image_sanitize_args . $path, $result);

	return $path;
}


function celebrate($dest_file, $item_type, $image_url, $image_alt, $meta_data = false)
{

?>
	<title><?php echo($site_name . ": " . $item_type); ?> inserted <3</title>
	<p>Thanks for feeding me</p>
	<p>Your <?php echo($item_type); ?>'s in safe hands</p>

	<img alt="<?php echo($image_alt); ?>" src="<?php echo($image_url); ?>">

	<p>Your <?php echo($item_type); ?>'s
		<a href="<?php echo ($dest_file); ?>">over here</a></p>
	<p><b><?php echo("https://" . get_cwd($_SERVER["REQUEST_URI"]) . "/" . $dest_file); ?></b></p>
<?php
	if ($meta_data) {
?>
	<p>It's meta-stuff (or lack thereof) is
		<a href="<?php echo($dest_file); ?>.txt">here</a></p>
<?php
	}
}


function celebrate_death($dest_file, $item_type, $image_url, $image_alt, $message)
{

?>
	<title><?php echo($site_name . ": " . $item_type); ?> burned </3</title>
	<p>Oh God, I've never seen so much blood—</p>
	<p>err, I mean, there're just some minor problems under the hood!</p>

	<img alt="<?php echo($image_alt); ?>" src="<?php echo($image_url); ?>">

	<?php echo($message); ?>

<?php
}

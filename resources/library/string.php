<?php

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


?>

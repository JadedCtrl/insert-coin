<?php


function write_metadata($filename, $desc, $source)
{
	$metafile = fopen($filename . ".txt", 'w');

	fwrite($metafile, "Source:\n\t" . implode('', sanitize_long_input($source, "\t")) . "\n");
	fwrite($metafile, "Descri:\n\t" . implode('', sanitize_long_input($desc, "\t")) . "\t");
	fclose($metafile);
}

function sanitize_long_input($sanitizee, $preface)
{
	$sanitized = [];
	$sani_len = strlen($sanitizee) - 1;

	if ($sani_len + 1 == 0)
	{
		$sanitized = "N/A";
		return $sanitized;
	}

	$j = 0;

	for($i = 0; $i <= $sani_len; $i++)
	{
		if ($i % 80 == 0 && $i != 0)
		{
			if (substr($sanitizee, $i, 1) == ' ')
			{
				$sanitized[$j] = "\n";
				$sanitized[$j + 1] = $preface;
				$j++;
			}
			else
			{
				$sanitized[$j] = "-";
				$sanitized[$j + 1] = "\n";
				$sanitized[$j + 2] = $preface;
				$sanitized[$j + 3] = $sanitizee[$i];
				$j += 3;
			}
		}
		else
		{
			$sanitized[$j] = $sanitizee[$i];
		}
		
		$j++;
	}
	
	return $sanitized;
}

function sanitize_filename($sanitizee)
{
	$sanitized = str_replace(" ", "_", $sanitizee);
	$sanitized = str_replace("..", "_", $sanitized);
	$sanitized = str_replace("/", "_", $sanitized);
	$sanitized = str_replace("\\", "_", $sanitized);

	return $sanitized;
}

function url_to_filename($url)
{
	$working = explode('/', $url);
	$filename = $working[count($working) - 1];

	return $filename;
}

?>

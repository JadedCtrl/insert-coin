<?php

include("res/config.php");


function write_alias($filename, $target)
{
	$file_p = fopen($filename, 'w');
		
	fwrite($file_p, "<?php header('Location: " . $target . "'); ?>\n");
	fclose($file_p);

	return 0;
}

function write_metadata($filename, $source)
{
	$metafile = fopen($filename . ".txt", 'w');

	if (empty($source))
	{
		$source = "[citation needed]";
	}


	fwrite($metafile, "Source:\n\t" . implode('', sanitize_long_input($source, "\t")) . "\n");
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

function get_cwd($url)
{
	$url_array = (explode("/", $url));
	
	if (end($url_array))
	{
		$parts = count($url_array);

		$url = $_SERVER["HTTP_HOST"] . implode(array_splice($url_array, 1, $parts - 2));

		return $url;
	}
	else 
	{
		return $url;
	}
}

function sanitize_image($path)
{
	exec("mogrify -strip " . $path, $result);
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
	if ($meta_data)
	{
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

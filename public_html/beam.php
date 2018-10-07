<?php 
$page_title = "The Beaming";

include("../resources/config.php");
include("../resources/library/main.php");

include("../resources/templates/header.php");
echo("\n<main>\n");


if (!empty($_POST["desired_filename"]))
{
	$file_name = $_POST["desired_filename"];

	if (!pathinfo($file_name, PATHINFO_EXTENSION))
	{
		$file_name = $file_name . "." .
			(pathinfo($_FILES["fileToUpload"]["name"],
				PATHINFO_EXTENSION));
	}

	$beaming_permitted = 0;
}
else if (!empty($_FILES["fileToUpload"]["name"]))
{
	$file_name = $_FILES["fileToUpload"]["name"];
	$file_name = sanitize_filename($file_name);
	$dest_file = $file_beam_dir . $file_name;

	$beaming_permitted = 0;
}
else
{
	$beaming_permitted = 1;
}

$file_name = sanitize_filename($file_name);
$dest_file = $file_beam_dir . $file_name;

if (file_exists($dest_file))
{
	$beaming_permitted = 2;	
}



switch ($beaming_permitted)
{
	case 1:
		celebrate_death($dest_file, $file_beam_item,
			$file_beam_die_img, $file_beam_die_alt,
			"<p>… you didn't upload anything, dope.
			<p>Try again.</p>");
		break;
	case 2:
		celebrate_death($dest_file, $url_aliasize_item,
			$file_beam_die_img, $file_beam_die_alt,
			"<p>Er, that coin already exists— try a different file-name.</p>");
		break;
	case 0:
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$dest_file))
		{
//			$file_ext = pathinfo($dest_file, PATHINFO_EXTENSION);
//			if ($file_ext == "jpg")
//			{
//				sanitize_image($dest_file);
//			}
			write_metadata($dest_file, $_POST["file_source"]);

			celebrate($dest_file, $file_beam_item,
				$file_beam_win_img, $file_beam_win_alt, true);
		}
		else
		{
			celebrate_death($dest_file, $url_aliasize_item,
				$file_beam_die_img, $file_beam_die_alt,
			"<p>What the hell just happened? :o</p>
			<p>I dunno, but maybe you should give it another go?</p>");
		}
		break;
}

?>

</main>

<?php
include("../resources/templates/footer.html");
?>

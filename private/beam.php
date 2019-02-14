<?php 
include("../res/config.php");
include("../res/library/main.php");

$file_name = $_FILES["uploadcoin"]["name"];
$file_ext = file_extension($file_name);
if (!empty($_POST["desired_filename"])) {
	$file_name = $_POST["desired_filename"];
	if (!file_extension($file_name)) {
		$file_name = $file_name . "." . $file_ext;
	}
}
$file_name = sanitize_filename($file_name);

$dest_name = $GLOBALS["file_beam_dir"] . $file_name;
$dest_file = root("public_html/" . $dest_name);



switch (true) {
	case (empty($file_name) || empty($dest_name)):
		redirect(make_url("result/beam.php?error=1"));
		break;

	case (file_exists($dest_file)):
		redirect(make_url("result/beam.php?error=2"));
		break;


	case (move_uploaded_file($_FILES["uploadcoin"]["tmp_name"], $dest_file)
	&& write_metadata($dest_file, $_POST["file_source"])):

		if (is_image($dest_file)) {
			sanitize_image($dest_file);
		}

		redirect(make_url("result/beam.php?success="
				. $file_name));
		break;

	default:
		redirect(make_url("result/beam.php"));
		break;
}

?>

<?php

// TITLE_STING TEMPLATE_PATH IMAGE_ALT IMAGE_PATH --> HTML
//	Create a general insert-coin webpage; relative path from rootdir 
//	for $image_path, and relative path from /resources/templates/
//	for $template
function create_page($page_title, $template, $image_alt_text, $image_path)
{
	include(root("resources/templates/header.php"));
	?><body><?php
	include(root("resources/templates/menu.php"));
	?><main><?php
	include(root("resources/templates/" . $template));
	?>
	<img
		alt="<?php echo($image_alt_text); ?>"
		src="<?php echo($image_path); ?>">
	</main> <?php
	include(root("resources/templates/footer.php"));
	?></body>
</html><?php
}

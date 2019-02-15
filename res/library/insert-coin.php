<?php

// TITLE_STING TEMPLATE_PATH IMAGE_ALT IMAGE_PATH --> HTML
//	Create a general insert-coin webpage; relative path from rootdir 
//	for $image_path, and relative path from /res/templates/
//	for $template
function create_page($page_title, $template, $image_alt_text, $image_path)
{
	include(root("res/templates/header.php"));
	?><body><?php
	include(root("res/templates/menu.php"));
	?><main><?php
	include(root("res/templates/" . $template));
	?>
	<img
		alt="<?php echo($image_alt_text); ?>"
		src="<?php echo(webroot($image_path)); ?>">
	</main> <?php
	include(root("res/templates/footer.php"));
	?></body>
</html><?php
}

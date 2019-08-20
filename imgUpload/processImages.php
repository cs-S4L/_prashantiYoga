<?php

	require "../init.php";

	if (!isset($_POST) || !isset($_FILES)) {
		echo 'Fehler. Post oder Files nicht gefüllt';
		die();
	}

	$content = new Content($GLOBALS['DB']);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>CMS Proccess Upload</title>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>

	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>
	
	<link rel="stylesheet" href="<?=BASE_URL?>_css/cmsEdit.css">
</head>
<body style="background:#fff">

	<?php
		// print_r($_FILES);
		// die();
		foreach($_FILES as $index => $file) {
			echo $index . ': ';
			echo $content->addImage($file);	
			echo '<br>';	
		}

	?>
	<script src="<?=BASE_URL?>_js/cmsEdit.js"></script>

</body>
</html>
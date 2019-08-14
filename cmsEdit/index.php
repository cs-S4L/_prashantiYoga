<?php

	require "../init.php";

	if (isset($_GET) && isset($_GET[DBCmsFields::Field])) {
		$fieldName = $_GET[DBCmsFields::Field];
		$order = $_GET['order'];
		$action = $_GET['action'];
		$currentField = $GLOBALS['Content']->getField($fieldName);
	} else {
		die('Fehler. Kein Feldname angeben.');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>CMS Edit <?=$fieldName?></title>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>

	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>
	
	<link rel="stylesheet" href="<?=BASE_URL?>_css/cmsEdit.css">
</head>
<body>

	<?= $currentField[$order]->renderEditForm();?>

	<script src="<?=BASE_URL?>_js/cmsEdit.js"></script>

</body>
</html>
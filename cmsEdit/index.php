<?php

	require "../init.php";

	if (isset($_GET) && isset($_GET[DBCmsFields::Field])) {
		$fieldName = $_GET[DBCmsFields::Field];
		$currentField = $GLOBALS['Content']->getField($fieldName);
	} else {
		die('Fehler. Kein Feldname angeben.');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>CMS Edit <?=$fieldName?></title>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>

	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>
	
	<link rel="stylesheet" href="<?=BASE_URL?>_css/index.css">
</head>
<body>

	<?= $currentField->renderEditForm();?>
</body>
</html>
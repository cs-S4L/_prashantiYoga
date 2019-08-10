<?php

	require "../init.php";

	if (isset($_GET) && isset($_GET['fieldName'])) {
		$fieldName = $_GET['fieldName'];
		$currentField = $GLOBALS['Content']->getField($fieldName);
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
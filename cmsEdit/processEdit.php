<?php 
	require "../init.php";

	if (isset($_POST) && isset($_POST[DBCmsFields::Field]) && isset($_POST[DBCmsFields::TemplateName])) {
		$templateObject = new $_POST[DBCmsFields::TemplateName]($_POST, $_POST[DBCmsFields::Field]);

		if ($GLOBALS['Content']->updateField($_POST[DBCmsFields::Field], $templateObject)) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		die('Fehler. Kein Feldname angeben.');
	}
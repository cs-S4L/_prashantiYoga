<?php 
	require "../init.php";

	if (
		isset($_POST) 
		&& isset($_POST[DBCmsFields::Field]) 
		&& isset($_POST[DBCmsFields::TemplateName])
		&& isset($_POST['order'])
		&& isset($_POST['action'])
	) {

		$currentField = $GLOBALS['Content']->getField($_POST[DBCmsFields::Field]);

		switch ($_POST['action']) {
			case 'insert':
				$templateObject = Template::createObject(
					$_POST[DBCmsFields::TemplateName],
					$_POST, 
					$_POST[DBCmsFields::Field], 
					$_POST['order']
				);

				$currentField->addTemplate($templateObject, $_POST['order']);
			break;

			case 'edit':
				$templateObject = Template::createObject(
					$_POST[DBCmsFields::TemplateName],
					$_POST, 
					$_POST[DBCmsFields::Field], 
					$_POST['order']
				);

				$currentField->editTemplate($templateObject, $_POST['order']);
			break;

			case 'delete':
				$currentField->removeTemplate($_POST['order']);
			break;


			default:
				echo 0;
			break;
		}

		if ($GLOBALS['Content']->updateField($currentField)) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		die('Fehler. Fehlerhafter POST.');
	}
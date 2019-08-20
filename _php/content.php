<?php
class Content {
	
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function addContentToDB($page, $field, $templateName, $content) {
		$data = [
			DBCmsFields::Page => $page,
			DBCmsFields::Field => $field,
			DBCmsFields::TemplateName => $templateName,
			DBCmsFields::Content => json_encode($content),
		];

		return $this->db->insertIntoDatabase(DBCmsFields::TableName, $data);
	}

	private function getFieldFromDBEntry($dbEntry) {
		try {
			$contentsArray = json_decode($dbEntry[DBCmsFields::Content]);
			$field = new Field($dbEntry[DBCmsFields::Field], $dbEntry[DBCmsFields::TemplateName]);

			for ($i=0; $i < count($contentsArray); $i++) {
				$templateObject = Template::createObject(
					$dbEntry[DBCmsFields::TemplateName],
					$contentsArray[$i],
					$dbEntry[DBCmsFields::Field],
					$i
				);
				$field->addTemplate(
					$templateObject
				);
			}
			
			return $field;
			
		} catch (Exception $e) {
			die("Error" . $e->getMessage() . "<br><br>Unknown Template");
		}
	}

	public function getPageContent($pageName) {
		$return = array();
		$where = DBCmsFields::Page."= '$pageName'";
		$contentObject = false;
		
		$dbEntrys = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($dbEntrys)) {
			foreach ($dbEntrys as $dbEntry) {
				$return[$dbEntry[DBCmsFields::Field]] = $this->getFieldFromDBEntry($dbEntry);
			}
		}

		return (empty($return)) ? null : $return;
	}

	public function getField($fieldName) {
		$return = array();
		$where = DBCmsFields::Field . "= '$fieldName'";
		$contentObject = false;

		$dbEntry = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($dbEntry)) {
			$return = $this->getFieldFromDBEntry($dbEntry[0]);
		}

		return (empty($return)) ? null : $return;
	}

	/**
	 * [updateField description]
	 * @param  [type] $fieldName [description]
	 * @param  [array] $input     [description]
	 * @return [type]            [description]
	 */
	public function updateField($field) {
		$json = $field->createJson();

		$values = DBCmsFields::Content ." = '".$json."'";

		$where = DBCmsFields::Field . " = '$field->name'";

		if (! $this->db->updateDatabase(DBCmsFields::TableName, $values, $where)) {
			return false;
		} else {
			return true;
		}
	}

	public function addImage($file) {
		if ($file['error'] === 4) {
			return 'leer.';
		}

		$file['name'] = htmlspecialchars($file['name']);

		if ($file["error"] === UPLOAD_ERR_FORM_SIZE
			|| $file['size'] > MAX_IMAGE_SIZE) {
			return 'Bild zu groß. Es ist eine maximale größe von '.MAX_IMAGE_SIZE/100000 . 'MB erlaubt';
		}

		$fileExtention = pathinfo($file['name'], PATHINFO_EXTENSION);
		$mimeType = $file['type'];

		if (array_key_exists($fileExtention, $GLOBALS["allowed_file_types"])
			&& $mimeType === $GLOBALS["allowed_file_types"][$fileExtention]) {
			$return = $this->handleImageFile($file);

			if ($return !== 1) {
				return $return;
			}

			$link = BASE_URL."_img/upload/".$file['name'];

			$this->addImageToDB($link);

			return 'Upload erfolgreich';

		} else {
			return 'Fehlerhafter Dateityp. Erlaubt sind JPG, JPEG oder PNG';
		}

		// print_r($file);
	}

	private function handleImageFile($file) {
		$filename = $file['name'];
		$filePath = DIR__IMGUPLOAD.DIRECTORY_SEPARATOR.$filename;

		if (file_exists($filePath)) {
			return 'Bild bereits vorhanden';
		}

		if (move_uploaded_file($file["tmp_name"], $filePath)) {
		  chmod($filePath, 0644);
		  return 1;
		} else {
		  return 'Fehler';
		}
	}

	private function addImageToDB($link) {
		$table = DBImages::TableName;

		$data = array(
			'link' => $link
		);

		$this->db->insertIntoDatabase($table, $data);
	}

	public function getAllImages() {
		return $this->db->readFromDatabase(DBImages::TableName);
	}
 
}
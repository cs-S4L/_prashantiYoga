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
			$field = new Field($dbEntry[DBCmsFields::Field]);

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

}
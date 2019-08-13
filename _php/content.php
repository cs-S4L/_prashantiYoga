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

	public function getPageContent($pageName) {
		$return = array();
		$where = DBCmsFields::Page."= '$pageName'";
		$contentObject = false;
		
		$contents = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($contents)) {
			foreach ($contents as $content) {
				try {
					$contentObject = json_decode($content[DBCmsFields::Content]);
					
					$return[$content[DBCmsFields::Field]] = new $content[DBCmsFields::TemplateName]($contentObject, $content[DBCmsFields::Field]);
				} catch (Exception $e) {
					die("Error" . $e->getMessage() . "<br><br>Unknown Template");
				}
			}
			// die();
		}

		return (empty($return)) ? null : $return;
	}

	public function getField($fieldName) {
		$return = null;
		$where = DBCmsFields::Field . "= '$fieldName'";
		$contentObject = false;

		$field = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($field)) {
			$contentObject = json_decode($field[0][DBCmsFields::Content]);
			$return = new $field[0][DBCmsFields::TemplateName]($contentObject, $field[0][DBCmsFields::Field]);
		}

		return (empty($return)) ? null : $return;
	}

	public function updateField($fieldName, $templateObject) {
		if (! $templateObject->validateFields()) {
			return false;
		}

		$json = $templateObject->createJsonString();

		$values = DBCmsFields::Content ."= '".$json."'";

		$where = DBCmsFields::Field . "= '$fieldName'";

		if (! $this->db->updateDatabase(DBCmsFields::TableName, $values, $where)) {
			return false;
		} else {
			return true;
		}
	}
}
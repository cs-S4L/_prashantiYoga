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
		
		$contents = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($contents)) {
			foreach ($contents as $content) {
				try {
// 					$type = 'Checkbox'; 
// $field = new $type();
// echo get_class($field);

					$return[$content[DBCmsFields::Field]] = new $content[DBCmsFields::TemplateName]($content[DBCmsFields::Content]);
				} catch (Exception $e) {
					die("Error" . $e->getMessage() . "<br><br>Unknown Template");
				}
			}
		}

		return (empty($return)) ? null : $return;
	}

	public function getField($fieldName) {
		$return = null;
		$where = DBCmsFields::Field . "= '$fieldName'";

		$field = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($field)) {
			$return = new $field[0][DBCmsFields::TemplateName]($field[0][DBCmsFields::Content]);
		}

		return (empty($return)) ? null : $return;
	}
}
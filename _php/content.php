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
		
		$dbEntrys = $this->db->readFromDatabase(DBCmsFields::TableName, $where);

		if (!empty($dbEntrys)) {
			foreach ($dbEntrys as $dbEntry) {
				try {
					$contentsArray = json_decode($dbEntry[DBCmsFields::Content]);
					$templateObjectArray = array();

					for ($i=0; $i < count($contentsArray); $i++) {
						array_push(
							$templateObjectArray, 
							new $dbEntry[DBCmsFields::TemplateName]($contentsArray[$i], $dbEntry[DBCmsFields::Field], $i)
						);
					}
					
					$return[$dbEntry[DBCmsFields::Field]] = $templateObjectArray;
					$templateObjectArray = array();
				} catch (Exception $e) {
					die("Error" . $e->getMessage() . "<br><br>Unknown Template");
				}
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
			$contentArray = json_decode($dbEntry[0][DBCmsFields::Content]);
			$className = $dbEntry[0][DBCmsFields::TemplateName];
			
			for ($i=0; $i < count($contentArray); $i++) {
				$return[] = new $className($contentArray[$i], $dbEntry[0][DBCmsFields::Field], $i);
			}
		}

		return (empty($return)) ? null : $return;
	}

	public function updateField($fieldName, $input) {
		if (is_array($input)) {
			$contentArray = $input;
		} else {
			echo 'Test';
			foreach ($input as $item) {
				$contentArray = array();
				array_push($contentArray, $item->getArray());
			}
		}

		$json = json_encode($contentArray);

		$json = str_replace('\\', '\\\\', $json);

		$values = DBCmsFields::Content ."= '".$json."'";

		$where = DBCmsFields::Field . "= '$fieldName'";

		if (! $this->db->updateDatabase(DBCmsFields::TableName, $values, $where)) {
			return false;
		} else {
			return true;
		}
	}

	public function createArrayFromTemplates($templateArray) {

	} 
}
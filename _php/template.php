<?php 

class Template {
	public $field;

	public function __construct($content, $field = null) {
		if (is_array($content)) {
			$content = (object) $content;
		}

		try {
			foreach($this->requiredFields as $fieldName) {
				$this->{$fieldName} = $content->{$fieldName};
			}
		} catch (Exception $e) {
			die('Template Invalid');
		}

		if (! is_null($fieldName)) {
			$this->field = $field;
		}
	}

	protected function getTemplatePath() {
		return DIR__PARTIALS . "templates". DIRECTORY_SEPARATOR .'t_'.get_class($this).".php";
	}

	protected function getEditFormPath() {
		return DIR__PARTIALS . "editForms". DIRECTORY_SEPARATOR .'edit_'.get_class($this).".php";
	}

	public function renderTemplate() {
		$file = $this->getTemplatePath();
		
		if (file_exists($file)) {
			include $file;
		} else {
			die('Template Not Exist');
		}
	}

	public function renderEditForm() {
		$file = $this->getEditFormPath();
		
		if (file_exists($file)) {
			include $file;
		} else {
			die('Template Not Exist');
		}	
	}

	public function validateFields() {
		// foreach($this->requiredFields as $fieldName) {
			// $this->{$fieldName} = htmlspecialchars($this->{$fieldName});
		// }

		return true;
	}

	public function createJsonString() {
		$fieldArray = array();

		foreach($this->requiredFields as $fieldName) {
			$fieldArray[$fieldName] = $this->{$fieldName};
		}

		$json = json_encode($fieldArray);

		return $json;
	}
}
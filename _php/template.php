<?php 

class Template {

	public function __construct($content) {
		$contentArray = json_decode($content);

		try {
			foreach($this->requiredFields as $field) {
				$this->{$field} = $contentArray->{$field};
			}
		} catch (Exception $e) {
			die('Template Invalid');
		}
	}

	protected function getTemplatePath() {
		return DIR__PARTIALS . "templates". DIRECTORY_SEPARATOR .get_class($this).".php";
	}

	protected function getEditFormPath() {
		return DIR__PARTIALS . "editForms". DIRECTORY_SEPARATOR .get_class($this).".php";
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
}
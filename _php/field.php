<?php
class Field {
	
	public $name;
	/**
	 * Array of Template Objects
	 * @var [type]
	 */
	public $templates;

	public function __construct($name, $templates=null) {
		$this->name = $name;

		if (!is_null($templates)) {
			$this->templates = $templates;
		} else {
			$this->templates = array();
		}
	}

	private function insertIntoNumericArray($arr, $insert, $index) {
		$return = array();

		for ($i = 0; $i < count($arr); $i++) {
			if ($i == $index) {
				$return[] = $insert;
			}
			$return[] = $arr[$i];
		}
		return $return;
	}

	public function addTemplate($template, $index=null) {
		if (is_null($index)) {
			$this->templates[] = $template;
		} else {
			$this->templates = $this->insertIntoNumericArray($this->templates, $template, $index);
		}
	}

	public function editTemplate($template, $index) {
		$this->templates[$index] = $template;
	}

	public function removeTemplate($index) {
		array_splice($this->templates, $index, 1);
	}

	public function renderField() {
		foreach ($this->templates as $template) {
			$template->renderTemplate();
		}
	}

	public function renderTemplateEdit($index) {
		$this->templates[$index]->renderEditForm();
	}

	/**
	 * create Array from Fieldclass
	 * return json and escape backslashes
	 * 
	 * @return [type] [description]
	 */
	public function createJson() {
		$fieldArray = array();
		foreach($this->templates as $template) {
			$fieldArray[] = $template->getArray();
		}

		$json = json_encode($fieldArray);

		$json = str_replace('\\', '\\\\', $json);

		return $json;
	}

}
<?php
class Field {
	
	public $name;
	public $templateName;

	/**
	 * Array of Template Objects
	 * @var Array
	 */
	public $templates;

	public function __construct($name, $templateName, $templates=null) {
		$this->name = $name;
		$this->templateName = $templateName;

		if (!is_null($templates)) {
			$this->templates = $templates;
		} else {
			$this->templates = array();
		}
	}

	/**
	 * inserts a new index into a numeric Array at a specific position
	 * @param  [type] $arr    [description]
	 * @param  [type] $insert [description]
	 * @param  [type] $index  [description]
	 * @return [type]         [description]
	 */
	private function insertIntoNumericArray($arr, $insert, $index) {
		$return = array();
		for ($i = 0; $i < count($arr); $i++) {
			if ($i == $index) {
				$return[] = $insert;
			}
			$return[] = $arr[$i];
		}

		if ($i == $index) {
			$return[] = $insert;
		}

		return $return;
	}

	/**
	 * 
	 * @param Object Template $template
	 * @param integer $index  	position at which template should be inserted (if null it's added to the end)
	 */
	public function addTemplate($template, $index=null) {
		if (is_null($index)) {
			$this->templates[] = $template;
		} else {
			$this->templates = $this->insertIntoNumericArray($this->templates, $template, $index);
		}
	}

	/**
	 * 
	 * @param  Object Template $template
	 * @param  integer $index    position at which template should be edited
	 */
	public function editTemplate($template, $index) {
		$this->templates[$index] = $template;
	}

	/**
	 * 
	 * @param  integer $index positon at which template should be removed
	 */
	public function removeTemplate($index) {
		array_splice($this->templates, $index, 1);
	}

	/**
	 * renders the templates in the Object
	 * @return [type] [description]
	 */
	public function renderField() {
		if (empty($this->templates)) {
			$order = 0;
			include(DIR__TEMPLATES.'templateEmptyField.php');
		}

		// foreach ($this->templates as $template) {
		for ($i=0; $i < count($this->templates); $i++) {
			if (($i == 0) && $this->templates[$i]->dynamicTemplateCount) {
				$order = $i;
				include(DIR__TEMPLATES.'templateEmptyField.php');
			}

			$this->templates[$i]->renderTemplate();

			if ($this->templates[$i]->dynamicTemplateCount) {
				$order = $i + 1;
				include(DIR__TEMPLATES.'templateEmptyField.php');
			}
		}
	}

	/**
	 * renders edit Form of a certain template in the Object
	 * @param  [type]  $index [description]
	 * @param  boolean $empty [description]
	 * @return [type]         [description]
	 */
	public function renderTemplateEdit($index, $empty = false) {
		if (!$empty) {
			$this->templates[$index]->renderEditForm();
		} else {
			$object = Template::createEmptyObject($this->templateName, $this->name, $index);
			$object->renderEditForm();
		}
	}

	/**
	 * create Array from Fieldclass
	 * return json and escape backslashes
	 * 
	 * @return string json string representation of object
	 */
	public function createJson() {
		$fieldArray = array();
		foreach($this->templates as $template) {
			$fieldArray[] = $template->getArray();
		}

		$json = json_encode($fieldArray);

		// $json = str_replace('\\', '\\\\', $json);

		return $json;
	}

}
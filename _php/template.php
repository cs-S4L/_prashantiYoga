<?php 

class Template {
	public $field;
	protected $order;

	public function __construct($content, $field = null, $order = null) {
		if (is_array($content)) {
			$content = (object) $content;
		}

		try {
			foreach($this->requiredFields as $fieldName) {
				$this->{$fieldName} = htmlspecialchars_decode($content->{$fieldName});
			}
		} catch (Exception $e) {
			die('Template Invalid');
		}

		$this->field = $field;
		$this->order = $order;
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

	/**
	 * [validateFields description]
	 * @return [type] [description]
	 *
	 * preg_replace von stackoverflow
	 * https://stackoverflow.com/questions/5946114/how-to-replace-newline-or-r-n-with-br
	 * last checked 13.08.2019 
	 */
	public function validateFields() {
		foreach($this->requiredFields as $fieldName) {
			$this->{$fieldName} = htmlspecialchars($this->{$fieldName});

			$this->{$fieldName} = preg_replace("/\r\n|\r|\n/",'<br/>',$this->{$fieldName});
		}

		return true;
	}

	/**
	 * [createJsonString description]
	 * @return [type] [description]
	 *
	 * str_replace nötig
	 * wenn nur ein \ vorhanden interpretiert die DB diesen als escape \
	 * deshalb muss ein weiterer Backslash den eigentlichen Backslash
	 * escapen, damit er in der DB ankommt
	 */
	public function createJsonString() {
		$fieldArray = array();

		foreach($this->requiredFields as $fieldName) {
			$fieldArray[$fieldName] = $this->{$fieldName};
		}

		$json = json_encode($fieldArray);

		$json = str_replace('\\', '\\\\', $json);

		return $json;
	}

	public function getArray() {
		$return = array();

		foreach($this->requiredFields as $fieldName) {
			$return[$fieldName] = $this->{$fieldName};
		}
		
		return $return;
	}

	public function writeToForm($field) {
		return str_replace('<br/>',"\r\n",$this->{$field});
	}
}
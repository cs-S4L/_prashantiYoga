<?php 

class Template {

	public $field;
	protected $order;

	protected $dynamicTemplateCount = true;

	public static function createObject($className, $content, $field=null, $order=null) {
		return new $className($content, $field, $order);
	}

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
			if ($this->dynamicTemplateCount) {
				include(DIR__TEMPLATES.'templateEmptyFieldBefore.php');
			}

			include(DIR__TEMPLATES.'templateHead.php');
			include $file;
			include(DIR__TEMPLATES.'templateFooter.php');

			if ($this->dynamicTemplateCount) {
				include(DIR__TEMPLATES.'templateEmptyFieldAfter.php');
			}
		} else {
			die('Template Not Exist');
		}
	}

	public function renderEditForm() {
		$file = $this->getEditFormPath();
		// include(DIR__PARTIALS . 'editForms' . DIRECTORY_SEPARATOR . 'defaultFields.php');
		
		if (file_exists($file)) {
			include(DIR__EDITFORMS . 'formHead.php');
			include $file;
			include(DIR__EDITFORMS . 'formFooter.php');
		} else {
			die('Template Not Exist');
		}	
	}

	/**
	 * script Tags entfernen
	 * htmlSpecialchars
	 * zeilenumbrüche in br umwandeln
	 * 
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function validate($value) {
		$value = str_replace('<script', '', $value);
		$value = str_replace('</script', '', $value);
		
		$value = htmlspecialchars($value);

		$value = preg_replace("/\r\n|\r|\n/",'<br/>',$value);

		return $value;
	}

	public function getArray($validate = true) {
		$return = array();

		foreach($this->requiredFields as $fieldName) {
			if ($validate) {
				$return[$fieldName] = $this->validate($this->{$fieldName});
			} else {
				$return[$fieldName] = $this->{$fieldName};
			}
		}
		
		return $return;
	}

	public function writeToForm($field) {
		return str_replace('<br/>',"\r\n",$this->{$field});
	}

}
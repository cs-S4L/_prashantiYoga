<?php 

class Template {

	const EMPTY = 'empty';

	public $field;
	public $order;
	public $dynamicTemplateCount = true;

	protected $className;


	public static function createObject($className, $content, $field=null, $order=null) {
		return new $className($content, $field, $order);
	}

	public static function createEmptyObject($className, $field = null, $order=null) {
		$content = array();

		foreach ($className::requiredFields as $fieldName) {
			$content[$fieldName] = '';
		}

		return new $className($content, $field, $order);
	}

	public function __construct($content, $field = null, $order = null) {
		if (is_array($content)) {
			$content = (object) $content;
		}

		$this->className = get_class($this);

		try {
			foreach($this->className::requiredFields as $fieldName) {
				if (is_array($content->{$fieldName})) {
					$this->{$fieldName} = $content->{$fieldName};
				} else {
					$this->{$fieldName} = htmlspecialchars_decode($content->{$fieldName});
				}

				if (empty($this->{$fieldName})) {
					$this->{$fieldName} = '';
				}
			}
		} catch (Exception $e) {
			die('Template Invalid');
		}

		$this->field = $field;
		$this->order = $order;
	}



	/**
	 * @return string path to file of the template
	 */
	private function getTemplatePath() {
		return DIR__PARTIALS . "templates". DIRECTORY_SEPARATOR .'t_'.get_class($this).".php";
	}

	/**
	 * @return string path to file of the edit Form
	 */
	private function getEditFormPath() {
		return DIR__PARTIALS . "editForms". DIRECTORY_SEPARATOR .'edit_'.get_class($this).".php";
	}

	/**
	 * remove script Tags
	 * escape htmlSpecialchars
	 * convert line breaks
	 * 
	 * @param  string $value string to validate
	 * @return string        validated String
	 */
	private function validate($value) {
		if (is_array($value)) {
			$value = json_encode($value);
		}
		$value = str_replace('<script', '', $value);
		$value = str_replace('</script', '', $value);
		
		$value = htmlspecialchars($value);

		$value = preg_replace("/\r\n|\r|\n/",'<br/>',$value);

		return $value;
	}

	/**
	 * renders the Template with the values in the Object
	 */
	public function renderTemplate() {
		$file = $this->getTemplatePath();
		
		if (file_exists($file)) {
			include(DIR__TEMPLATES.'templateHead.php');
			include $file;
			include(DIR__TEMPLATES.'templateFooter.php');
		} else {
			die('Template Not Exist');
		}
	}

	/** renders a Form to edit the current Template Object */
	public function renderEditForm() {
		$file = $this->getEditFormPath();
		
		if (file_exists($file)) {
			include(DIR__EDITFORMS . 'formHead.php');
			include $file;
			include(DIR__EDITFORMS . 'formFooter.php');
		} else {
			die('Template Not Exist');
		}	
	}

	/**
	 * returns Array with the Values in the current Object
	 * @param  boolean $validate Boolean wether or not function should validate Values before writing them to the Array
	 * @return Array            
	 */
	public function getArray($validate = true) {
		$return = array();

		foreach($this->className::requiredFields as $fieldName) {
			if ($validate) {
				$return[$fieldName] = $this->validate($this->{$fieldName});
			} else {
				$return[$fieldName] = $this->{$fieldName};
			}
		}
		
		return $return;
	}

	/**
	 * convert Values to write them to an edit Form
	 * @param  string $field
	 * @return string        
	 */
	public function writeToForm($field) {
		return str_replace('<br/>',"\r\n",$this->{$field});
	}

}
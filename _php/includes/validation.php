<?php
class Validation {

	public $username = null;
	public $name = null;
	public $mail = null;
	public $password = null;
	public $password2 = null;

	public $errorMessages = null;

	public $formValid = null;

	private $form = null;
	private $requiredFields = array(
		"username" => "Geben Sie einen Nutzername ein.",
		"name" => "Geben Sie ihren Vornamen ein",
		"mail" => "Bitte geben Sie eine gültige E-Mail-Adresse mit maximal 50 Zeichen ein. Bitte geben Sie eine gültige E-Mail-Adresse ein",
	);

	private $regex = array(
		"mail" => array(
			"regex" => "/.{2,}@.{2,}\..+/",
			"error" => "Ihre Mailadresse muss mindestens ein @ und ein . enthalten",
		),
		"phone" => array(
			"regex" => "/\d{4,}/",
			"error" => "Ihre Telefonnummer muss mindestens vier Stellen lang sein",
		),
	);

	function __construct($form) {
		$this->form = $form;

		// if ($_SERVER["REQUEST_METHOD"] != "POST") {
		// 	return;
		// }
		
		$this->username = $this->test_input("username");
		$this->name = $this->test_input("name");
		$this->mail = $this->test_input("mail");
		$this->password = $this->test_input("password");
		$this->wipassword2sh = $this->test_input("password2");

		$this->formValid = true;

		$this->validateForm();
	}

	public function test_input($index) {
		if (isset($this->form[$index])) {
			$data = $this->form[$index];
		} else {
			return null;
		}

		$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);

	  	return $data;
	}

	public function validateForm() {
		$this->checkRequiredFields();

		$this->checkPassword();

		$this->checkRegex();
	}

	public function checkRequiredFields() {
		$arr = $this->requiredFields;
		foreach ($arr as $field => $error) {
			if (empty($this->{$field})) {
				$this->errorMessages[$field] = $error;
				$this->formValid = false;
			}
		}
	}

	public function checkPassword() {
		if ($this->password != $this->password2) {
			$this->errorMessages['password'] = 'Die Passwörter stimmen nicht überein';
			$this->formValid = false;
		}
	}

	public function checkRegex() {
		$arr = $this->regex;

		foreach ($arr as $field => $array) {
			if ( (!empty($this->{$field})) && (empty($this->errorMessages[$field])) ) {
				if (! preg_match($array['regex'], $this->{$field})) {
					$this->errorMessages[$field] = $array['error'];
					$this->formValid = false;
				}
			}
		}
	}

	public function getErrorMessage($index) {
		if (is_null($this->errorMessages)) {
			return '';
		}

		if (isset($this->errorMessages[$index])) {
			return $this->errorMessages[$index];
		} else {
			return '';
		}
	}

	public function getAllErrorMessages() {
		$return = '';
		if (empty($this->errorMessages)) {
			return '';
		}

		foreach($this->errorMessages as $errorMessage) {
			$return .= $errorMessage . '<br>';
		}
		return $return;
	}

	public function isValid($index) {
		if (is_null($this->form)) return '';

		if (!empty($this->errorMessages[$index])) {
			return 'invalid';
		} else {
			return 'valid';
		}
	}

	public function getGender() {
		if (!empty($this->gender_m)) {
			return 'm';
		} else if (!empty($this->gender_w)) {
			return 'w';
		} else {
			return '';
		}
	}
}
?>
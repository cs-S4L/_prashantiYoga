<?php

class Login {

	const HashAlgorithm = "sha256";
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	private $salt = "ceb20772e0c9d240c75eb26b0e37abee";
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function checkLogin($username, $password) {
		$hash = hash(Login::HashAlgorithm, $password . $this->salt);

		$result = $this->searchLoginInDB($username, $hash);

		//wenn user nicht gefunden 0 zurück geben
		if ( (empty($result)) ) {
			return 0;
		//wenn user inaktiv 2 zurück geben
		} else if (	(!isset($result[0]['status'])) || ($result[0]['status'] == Login::STATUS_INACTIVE) ) {
			return 2;
		// ansonsten User einloggen
		} else {
			$_SESSION['token_Login'] = [
				DBUsers::Username => $result[0]['username'],
				DBUsers::Password => $result[0]['password']
			];
			return 1;			
		}
	}

	public function checkLoggedIn() {
		if (
			isset($_SESSION) 
			&& isset($_SESSION['token_Login'])
		) {
			$token = $_SESSION['token_Login'];
		} else {
			return false;
		}

		$result = $this->searchLoginInDB($token['username'], $token['password']);

		if (empty($result)) {
			return false;
		} else {
			return true;
		}
	}

	public function registerNewUser($input) {
		$validator = new Validation($input);
		$errorMessageString = $validator->getAllErrorMessages();

		if (empty($errorMessageString)) {
			$foundUsername = $this->searchUsernameInDB($validator->username);
			if (!empty($foundUsername)) {
				return array(
					'status' => 0,
					'message' => 'Nutzername existiert bereits'
				);
			}

			$this->addUser(
				$validator->username,
				$validator->password,
				$validator->mail,
				$validator->name
			);

			return array(
				'status' => 1,
				'message' => ''
			);
			
		} else {
			return array(
				'status' => 0,
				'message' => $errorMessageString
			);
		}
	}

	public function addUser($username, $password, $mail='', $name='') {
		$data = [
			DBUsers::Username => $username,
			DBUsers::Mail => $mail,
			DBUsers::Name => $name,
			DBUsers::Password => hash(Login::HashAlgorithm, $password . $this->salt)
		];

		$return = $this->db->insertIntoDatabase('users', $data);
		print_r($return);
		return $return;
	}

	private function searchLoginInDB($username, $hash) {
		return $this->db->readFromDatabase(
			DBUsers::TableName,
			DBUsers::Username." = '$username' AND ".DBUsers::Password." = '$hash'"
		);
	}

	private function searchUsernameInDB($username) {
		return $this->db->readFromDatabase(
			DBUsers::TableName,
			DBUsers::Username." = '$username'"
		);	
	}

}
<?php

class Login {

	const HashAlgorithm = "sha256";

	private $salt = "ceb20772e0c9d240c75eb26b0e37abee";
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function checkLogin($username, $password) {
		$hash = hash(Login::HashAlgorithm, $password . $this->salt);

		$result = $this->searchLoginInDB($username, $hash);

		if (empty($result)) {
			return 0;
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

	public function addUser($username, $password) {
		if (strlen($password) < 8) {
			return false;
		}

		$data = [
			DBUsers::Username => $username,
			DBUsers::Password => hash(Login::HashAlgorithm, $password . $this->salt)
		];

		return $this->db->insertIntoDatabase(DBUsers::TableName, $data);
	}

	private function searchLoginInDB($username, $hash) {
		return $this->db->readFromDatabase(
			"users",
			"username = '$username' AND password = '$hash'"
		);
	}

}
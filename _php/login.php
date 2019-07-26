<?php

class Login {

	private $username;
	private $password;
	private $db;

	public function __construct($input) {
		$this->username = $input['username'];
		$this->password = $input['password'];

		$this->db = $GLOBALS['DB'];
	}

	public function checkLogin() {
		$hash = hash("sha256", $this->password);
		$result = $this->db->readFromDatabase(
			"users",
			"username = '$this->username' AND password = '$hash'"
		);

		if (empty($result)) {
			return 0;
		} else {
			$_SESSION['token_Login'] = [
				"username" => $result[0]['username'],
				"password" => $result[0]['password']
			];
			return 1;			
		}
		// SELECT * FROM users WHERE username = "test" AND password = "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8"


		// $data = [
		// 	'username' => "Test",
		// 	'password' => hash("sha256", "password")
		// ];
		// $this->db->insertIntoDatabase('users', $data);
	}
}
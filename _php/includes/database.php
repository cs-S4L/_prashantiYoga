<?php

class Database {

	private $conn;

	public function __construct($host, $user, $password, $dbname, $port) {
		try {
			$this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    		// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			die("Connection failed: " . $e->getMessage());
		}
	}

	// function executeStatement($sql) {
	// 	$this->conn->exec($sql);
	// }

	public function insertIntoDatabase($table, $data) {
		$fields = "";
		$params = "";

		foreach ($data as $key => $value) {
			$fields .= "$key, ";
			$params .= ":$key, ";
		}

		$fields = rtrim($fields ,", ");
		$params = rtrim($params ,", ");

		$sql = $this->conn->prepare(
			"INSERT INTO $table ($fields) VALUES ($params)"
		);

		foreach ($data as $key => &$value) {
			echo "$key und $value <br>";
			$sql->bindParam(":$key", $value);
		}

		$sql->execute();
	}

	public function readFromDatabase($table, $where = null, $selection = '*') {
		$statement = "";
		if (is_null($where)) {
			$statement = "SELECT $selection FROM $table";
		} else {
			$statement = "SELECT $selection FROM $table WHERE $where";
		}

		$sql = $this->conn->prepare($statement);

		$sql->execute();

		return $sql->fetchAll();
	}
}

?>








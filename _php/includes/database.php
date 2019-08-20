<?php

class Database {

	private $conn;

	public function __construct($host, $user, $password, $dbname, $port) {
		try {
			$this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    		// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			die("Connection failed: " . $e->getMessage());
		}
	}

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
			$sql->bindParam(":$key", $value);
		}

		$sql->execute();
	}

	public function readFromDatabase($table, $where = null, $selection = '*', $fetchMode=PDO::FETCH_ASSOC) {
		$statement = "";
		if (is_null($where)) {
			$statement = "SELECT $selection FROM $table";
		} else {
			$statement = "SELECT $selection FROM $table WHERE $where";
		}

		$sql = $this->conn->prepare($statement);

		// $this->logDatabaseAccess($statement);

		$sql->execute();

		return $sql->fetchAll($fetchMode);
	}

	public function updateDatabase($table, $values, $where=null) {
		$statement = "";

		if (is_null($where)) {
			$statement = 'UPDATE '.$table.' SET '.$values.';';
		} else {
			$statement = 'UPDATE '.$table.' SET '.$values.' WHERE '.$where.';';
		}

		$sql = $this->conn->prepare($statement);

		// $this->logDatabaseAccess($statement);

		return $sql->execute();
	}

	private function logDatabaseAccess($statement) {
		if (SERVER_ENVIRONMENT == 'LIVE') {
			return;
		}

		$log = date('m/d/Y h:i:s a', time()).':      '.$statement;

		//copied from stackoverflow.com
		//https://stackoverflow.com/questions/24972424/create-or-write-append-in-text-file
 		$myfile = file_put_contents(DIR__ROOT.'dbLogs.txt', $log.PHP_EOL , FILE_APPEND | LOCK_EX);

	}

}

?>








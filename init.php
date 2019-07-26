<?php
define("DIR__ROOT", __DIR__ . DIRECTORY_SEPARATOR);
define("DIR__PHP", DIR__ROOT . "_php" . DIRECTORY_SEPARATOR);
define("DIR__PARTIALS", DIR__ROOT . "_partials" . DIRECTORY_SEPARATOR);
define("DIR__CSS", DIR__ROOT . "css" . DIRECTORY_SEPARATOR);

require DIR__ROOT . "server.php";

require DIR__PHP . "includes/config.php";
require DIR__PHP . "includes/database.php";
require DIR__PHP . "includes/helperFunctions.php";

$GLOBALS['DB'] = new Database(
	$cfg['db_host'],
	$cfg['db_user'],
	$cfg['db_password'],
	$cfg['db_name'],
	$cfg['port']
);

session_start();

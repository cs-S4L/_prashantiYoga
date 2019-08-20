<?php
session_start();

define("DIR__ROOT", __DIR__ . DIRECTORY_SEPARATOR);
define("DIR__PHP", DIR__ROOT . "_php" . DIRECTORY_SEPARATOR);
define("DIR__PARTIALS", DIR__ROOT . "_partials" . DIRECTORY_SEPARATOR);

define("DIR__TEMPLATES", DIR__PARTIALS . "templates" . DIRECTORY_SEPARATOR);
define("DIR__EDITFORMS", DIR__PARTIALS . "editForms" . DIRECTORY_SEPARATOR);

require DIR__ROOT . "server.php";

require DIR__PHP . "includes".DIRECTORY_SEPARATOR."config.php";
require DIR__PHP . "includes".DIRECTORY_SEPARATOR."helperFunctions.php";
require DIR__PHP . "includes".DIRECTORY_SEPARATOR."database.php";
require DIR__PHP . "includes".DIRECTORY_SEPARATOR."login.php";
require DIR__PHP . "includes".DIRECTORY_SEPARATOR."validation.php";

require DIR__PHP . "database".DIRECTORY_SEPARATOR."DBUsers.php";
require DIR__PHP . "database".DIRECTORY_SEPARATOR."DBPages.php";
require DIR__PHP . "database".DIRECTORY_SEPARATOR."DBCmsFields.php";

require DIR__PHP . "page.php";
require DIR__PHP . "template.php";
require DIR__PHP . "content.php";
require DIR__PHP . "field.php";

require DIR__PHP . "templates".DIRECTORY_SEPARATOR."TextWithHeading.php";
require DIR__PHP . "templates".DIRECTORY_SEPARATOR."Location.php";
require DIR__PHP . "templates".DIRECTORY_SEPARATOR."Schedule.php";
require DIR__PHP . "templates".DIRECTORY_SEPARATOR."Pricing.php";
require DIR__PHP . "templates".DIRECTORY_SEPARATOR."Text.php";

// require DIR__RESSOURCES . "Mustache".DIRECTORY_SEPARATOR."Autoloader.php";

/** 
 * Create Database Object
 */
$GLOBALS['DB'] = new Database(
	$cfg['db_host'],
	$cfg['db_user'],
	$cfg['db_password'],
	$cfg['db_name'],
	$cfg['port']
);

/** 
 * Check Login
 */
$GLOBALS['Login'] = new Login($GLOBALS['DB']);

$GLOBALS['Content'] = new Content($GLOBALS['DB']);

$GLOBALS['LoggedIn'] = $GLOBALS['Login']->checkLoggedIn();

/**
 * Register Mustache
 */
// Mustache_Autoloader::register();
// $GLOBALS['Mustache'] = new Mustache_Engine;






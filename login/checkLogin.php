<?php
	require "../init.php";

	if (isset($_GET) && isset($_GET['logout'])) {
		$_SESSION['token_Login'] = null;
		$header = "Location: " . BASE_URL;
		header($header);
		die();
	}

	$login = $GLOBALS['Login'];

	if (
		isset($_POST) 
		&& isset($_POST['username'])
		&& isset($_POST['password'])
	) {
		echo $login->checkLogin($_POST['username'], $_POST['password']);
	} else {
		return 0;
	}

?>
<?php
	require "../init.php";

	if (isset($_GET) && isset($_GET['logout'])) {
		$_SESSION['token_Login'] = null;
		$header = "Location: " . BASE_URL;
		header($header);
		die();
	}

	include DIR__PHP . "login.php";

	$login = new Login($_POST);

	echo $login->checkLogin();
?>
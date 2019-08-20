<?php
	require "../init.php";

	$login = $GLOBALS['Login'];

	if (
		isset($_POST) 
	) {
		echo json_encode($login->registerNewUser($_POST));
	} else {
		return 0;
	}

?>
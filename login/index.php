<?php
	require "../init.php";

	if ($GLOBALS['LoggedIn']) {
		$header = "Location: " . BASE_URL;
		header($header);
		die();
	}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">

	<title>Login - Prashanti Yoga CMS</title>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>
	
	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>

	<!-- Open Sans Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- Main -->
	<link rel="stylesheet" href="<?=BASE_URL?>_css/login.css">
</head>
<body>

	<section class="noMarginBottom">
		<div class="section__inner">
			<form id="login" action="<?=BASE_URL?>login/checkLogin.php" method="POST" class="">
				<h3>Login</h3>
				<label for="username">Nutzername:</label>
				<input id="username" name="username" type="text"><br>
				<label for="password">Passwort:</label>
				<input id="password" name="password" type="text">
				<p class="errorMessage invalid">Login fehlgeschlagen!</br>Versuche es erneut</p>
				<p class="errorMessage inactiveUser">Der eingegebene Benutzername ist nicht aktiviert!</p>
				<input type="submit" name="submit">
				<div class="linkWrapper">
					<a href="#">Registrieren</a>
				</div>
			</form>
		</div>
	</section>

	<section>
		<div class="section__inner">
			<form id="register" action="<?=BASE_URL?>login/register.php" method="POST" class="hidden">
				<h3>Registrieren</h3>
				<label for="username">Nutzername:</label>
				<input id="username" name="username" type="text"><br>

				<label for="name">Name:</label>
				<input id="name" name="name" type="text"><br>

				<label for="password">Passwort:</label>
				<input id="password" name="password" type="text">

				<label for="password2">Passwort wiederholen:</label>
				<input id="password2" name="password2" type="text">

				<label for="mail">Mail:</label>
				<input id="password" name="mail" type="text">
				
				<p class="errorMessage invalid">Fehler aufgetreten</p>
				<input type="submit" name="submit">
			</form>
		</div>
	</section>

	<script src="<?=BASE_URL?>_js/login.js"></script>
</body>
</html>
<?php
	include './config.php';
	include './php/database.php';
	
	$connection = connect_db();
	
	$submitted = false;
	$error = false;
	$error_message = '';
	
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
		$submitted = true;
		
		if (does_username_exist($connection, $_POST['username'])) {
			$error = true;
			$error_message = 'Der Benutzername existiert bereits.';
		} else if (strcmp($_POST['password'], $_POST['password2']) != 0) {
			$error = true;
			$error_message = 'Die Passwörter stimmen nicht überein.';
		} else if (strlen($_POST['username']) == 0 || strlen($_POST['password']) == 0) {
			$error = true;
			$error_message = 'Benutzername und Passwort dürfen nicht leer sein!';
		} else {
			register_user($connection, $_POST['username'], $_POST['password']);
		}
	}
?><!DOCTYPE html>
<html lang="de">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8" />
		<title>Registrierung</title>
		<link rel="stylesheet" href="/css/general.css" type="text/css" />
		<link rel="stylesheet" href="/css/specific.css" type="text/css" />
		<link rel="stylesheet" href="/css/highlightjs/default.css">
		<style>
			table tr td, table tr td * {
				font-size: 1.3rem;
			}
			
			input {
				padding: 4px;
			}
		</style>
	</head>
	<body>
		<div id="vue">
			<header>
				<p></p>
				<p></p>	
			</header>
			<vue-nav location="registrierung"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Registrierung</h1></div>
				<section>
					<?php
						if ($submitted) {
							if ($error) {
								echo '<p>'. $error_message .'</p>';
							} else {
								echo '<p>Benutzer erfolgreich angelegt.</p>';
							}
						}
					?>
					<form method="post" action="/registrierung/">
						<table>
							<tr>
								<td>Benutzername</td>
								<td><input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" /></td>
							</tr>
							<tr>
								<td>Passwort</td>
								<td><input type="password" name="password" /></td>
							</tr>
							<tr>
								<td>Passwort wiederholen</td>
								<td><input type="password" name="password2" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Registrieren" /></td>
							</tr>
						</table>
					</form>
				</section>
			</main>
			<vue-footer></vue-footer>
		</div>
		<script src="/js/jquery.js"></script>
		<script src="/js/vue.js"></script>
		<script src="/js/highlight.pack.js"></script>
		<script src="/js/vue_comp.js"></script>
		<script src="/js/script.js"></script>
		<script src="/js/default/script.js"></script>
	</body>
</html>
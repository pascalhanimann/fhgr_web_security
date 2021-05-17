<?php
	include './config.php';
	include './php/database.php';
	
	$connection = connect_db();
	
	$submitted = false;
	$success = false;
	
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$submitted = true;
		
		if (check_password($connection, $_POST['username'], $_POST['password'])) {
			$success = true;
		}
	}
?><!DOCTYPE html>
<html lang="de">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8" />
		<title>Login</title>
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
			<vue-nav location="login"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Login</h1></div>
				<section>
					<?php
						if ($submitted) {
							if ($success) {
								echo '<p>Login erfolgreich.</p>';
							} else {
								echo '<p>Benutzername oder Passwort stimmen leider nicht.</p>';
							}
						}
						
						if (!$success) {
					?>
					<form method="post" action="/login/">
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
								<td></td>
								<td><input type="submit" value="Einloggen" /></td>
							</tr>
						</table>
					</form>
					<?php } ?>
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
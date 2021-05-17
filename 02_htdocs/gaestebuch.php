<?php
	include './config.php';
	include './php/database.php';
	
	$connection = connect_db();
	
	$submitted = false;
	$success = false;
	
	if (isset($_POST['name']) && isset($_POST['content'])) {
		$submitted = true;
		
		if (strlen($_POST['name']) > 0 && strlen($_POST['content']) > 0) {
			insert_guestbook_entry($connection, $_POST['name'], $_POST['content']);
			$success = true;
		}
	}
?><!DOCTYPE html>
<html lang="de">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8" />
		<title>Gästebuch</title>
		<link rel="stylesheet" href="/css/general.css" type="text/css" />
		<link rel="stylesheet" href="/css/specific.css" type="text/css" />
		<link rel="stylesheet" href="/css/highlightjs/default.css">
		<style>
			input, textarea {
				font-size: 1.3rem;
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
			<vue-nav location="gaestebuch"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Gästebuch</h1></div>
				<section>
					<?php
						if ($submitted) {
							if ($success) {
								echo '<p>Gästebucheintrag erfasst!</p>';
							} else {
								echo '<p>Name und Eintrag dürfen nicht leer sein.</p>';
							}
						}
						
						if (!$success) {
						?>
							<form method="post" action="/gaestebuch/">
								Dein Name: <input type="text" name="name" /><br />
								<textarea name="content" rows="6" cols="64"></textarea><br />
								<input type="submit" value="Eintragen" />
							</form>
						<?php
						}
						
						foreach (get_guestbook_entries($connection) as $entry) {
							echo '<h3>'. $entry['name'] .' schreibt:</h3>';
							echo '<p>'. $entry['content'] .'</p>';
						}
					?>
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
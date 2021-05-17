<?php
	include './config.php';
	include './php/database.php';
	
	$message = "Unbekannter Fehler";
	
	if (isset($_GET['message'])) {
		$message = $_GET['message'];
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
	</head>
	<body>
		<div id="vue">
			<header>
				<p></p>
				<p></p>	
			</header>
			<vue-nav location="gaestebuch"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Fehler</h1></div>
				<section>
					<p><?php echo $message; ?></p>
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
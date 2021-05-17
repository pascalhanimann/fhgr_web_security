<?php
	include './config.php';
	include './php/database.php';
	
	$connection = connect_db();
?><!DOCTYPE html>
<html lang="de">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8" />
		<title>Günther's Hamstershop</title>
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
			<vue-nav location="index"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Günther's Hamstershop</h1></div>
				<section>
					<p>Herzlich willkommen in <b>Günther's Hamstershop</b>!</p>
					<p>Bei uns finden Sie viel nützliches Zubehör für Ihren Hamster. Egal, ob kleine Snacks, ein Hamsterrad oder sogar ein ganzes Terrarium: Hier werden Sie fündig.</p>
					<p class="center"><img src="./images/hamster.jpeg" alt="Hamster" /></p>
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
<?php

ini_set('display_errors', 1);
error_reporting(~0);
	include './config.php';
	include './php/database.php';
	
	$connection = connect_db();
	
	$search = '';
	
	if (isset($_POST['search'])) {
		$search = $_POST['search'];
	}
?><!DOCTYPE html>
<html lang="de">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8" />
		<title>Unsere Produkte</title>
		<link rel="stylesheet" href="/css/general.css" type="text/css" />
		<link rel="stylesheet" href="/css/specific.css" type="text/css" />
		<link rel="stylesheet" href="/css/highlightjs/default.css">
		<style>
			input {
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
			<vue-nav location="unsere-produkte"></vue-nav>
			<main class="default">
				<div class="h1"><h1>Unsere Produkte</h1></div>
				<section>
					<p>
						<form method="post" action="/unsere-produkte/">
							Suchen nach: <input type="text" name="search" value="" /> <input type="submit" value="Suchen" />
						</form>
					</p>
					<p>
						<table>
							<tr>
								<th>Bild</th>
								<th>Beschreibung</th>
								<th>Preis</th>
							</tr>

						<?php
							foreach (get_products($connection, $search) as $product) {
								?>
								<tr>
									<td><?php echo '<img src="/images/'. $product['image'] .'" />'; ?></td>
									<td><?php echo $product['product']; ?></td>
									<td><?php echo $product['price']; ?></td>
								</tr>
								<?php
							}
						?>
						</table>
					</p>
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
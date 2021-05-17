<?php
	function connect_db() {
		return new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USER, DB_PASSWORD);
	}
	
	function does_username_exist($connection, $username) {
		$stmt = $connection->query("SELECT COUNT(*) AS `count` FROM `user` WHERE `username` = '". $username ."'");
		$row = $stmt->fetch();
		
		return ($row['count'] > 0);
	}
	
	function register_user($connection, $username, $password) {
		$connection->query("INSERT INTO `user` ( `username`, `password` ) VALUES ( '". $username ."', '". $password ."' )");
	}
	
	function check_password($connection, $username, $password) {
		$stmt = $connection->query("SELECT `password` FROM `user` WHERE `username` = '". $username ."'");
		$row = $stmt->fetch();
		
		if ($row != false) {
			return (strcmp($row['password'], $password) == 0);
		}
		
		return false;
	}
	
	function insert_guestbook_entry($connection, $name, $content) {
		$connection->query("INSERT INTO `guestbook` ( `name`, `time`, `content` ) VALUES ( '". $name ."', NOW(), '". $content ."' )");
	}
	
	function get_guestbook_entries($connection) {
		$entries = array();
		$stmt = $connection->query("SELECT * FROM `guestbook` ORDER BY `time` DESC");
		
		while ($row = $stmt->fetch()) {
			array_push($entries, $row);
		}
		
		return $entries;
	}
	
	function get_products($connection, $search) {
		$entries = array();
		$stmt = $connection->query("SELECT * FROM `product` WHERE `product` LIKE '%". $search ."%'");
		
		while ($row = $stmt->fetch()) {
			array_push($entries, $row);
		}
		
		return $entries;
	}
?>
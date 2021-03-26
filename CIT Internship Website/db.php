<?php
	//Change this to match Henrico County Server
	$host = 'localhost';
	$user = 'root';
	$pass = 'google';
	$db = 'accounts';
	$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->mysqli_error());

?>
<?php

$host = 'mysql.metropolia.fi';
$dbname = 'saminar';
$user = 'saminar';
$pass = 'mysql';

try {
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "set names 'utf8';";
	$STH = $DBH->query($sql);
}
catch(PDOException $e) {
	echo "Could not connect to database.";
	file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}

?>
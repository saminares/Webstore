<?php
session_start();
require_once('common/dbConnect.php');
if($_SESSION['cart']){
	$cartArray = unserialize($_SESSION['cart']);
	foreach($cartArray as $id){
		$sql ="SELECT * FROM Customers";
		$STH= $DBH->query($sql);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		echo $row['FirstName']. ', '.$row['LastName'].'<br />';

	}}else{
		echo 'Cart empty<br />';

	}

	?>

<a href="task1.php">Back</a>

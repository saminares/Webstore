<?php
session_start();
require_once('common/dbConnect.php');

// shopping cart
if ($_GET['ID']){
	$cartArray = unserialize($_SESSION['cart']);
	$cartArray[] = $_GET['ID'];
	$_SESSION['cart'] = serialize($cartArray);
	// print_r($cartArray);
}

if($_SESSION['cart']){
	$cart = unserialize($_SESSION['cart']);
	$rowArray = array();
	foreach($cart as $id){
		$sql = "SELECT * FROM lab3 WHERE ID = $id;";
		$STH = @$DBH->query($sql);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		$rowArray[] = $STH->fetch();
	}
	echo json_encode($rowArray);
} 
?>
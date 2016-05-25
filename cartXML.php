<?php
session_start();
header('Content-Type: text/xml');
require_once('common/dbConnect.php');

// shopping cart
if (isset($_GET['id'])){
	$id = $_GET['id'];

	$cartArray = array();

	$cartArray = unserialize($_SESSION['cart']);

	$cartArray[] = $id;

	$_SESSION['cart'] = serialize($cartArray);

	// print_r($cartArray);
}

$writer = new XMLWriter();
$writer->openURI('php://output');
$writer->startDocument('1.0');

$writer->startElement('root');

if(isset($_SESSION['cart'])){
	$cart = unserialize($_SESSION['cart']);
	foreach($cart as $id){
		$writer->startElement('Album');
		$sql = "SELECT * FROM Products WHERE ProductID = $id;";
		$STH = @$DBH->query($sql);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		$writer->writeElement('name', $row['Album']);
		$writer->writeElement('price', $row['Price']);
		$writer->endElement();
	}	
} 

$writer->endElement();

$writer->endDocument();

$writer->flush(); 
?>
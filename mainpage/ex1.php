<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ex 1</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
<?php
require_once('common/dbConnect.php');
require_once('common/dbFunctions.php');
require_once('common/functions.php');
$sql = "SELECT * FROM lab3;";
$STH = $DBH->query($sql);

echo productList2($STH);


?>
<br />
<a onclick="emptyCart();" href="#">Empty cart</a>
<div id="cart"></div>
</body>
</html>







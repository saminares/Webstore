<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Exercise 1</title>
<script src="js/functions.js"></script>
</head>
<body>
<img src="logo.jpg" width="14%" />

<?php
echo ("<h2>You are logged in as ". $_SESSION['username']."! <a href=\"logout.php\">logout</a></h2></br>"); 

require_once('common/dbConnect.php');
require_once('common/dbFunctions.php');

//empty cart
if(!$_SESSION['logged']) 
{ 
    redirect('logout.php'); 
} 

if($_GET['action'] == 'empty')
unset($_SESSION['cart']);
//end empty cart

//print list
$sql = "SELECT * FROM Products;";
$STH = $DBH->query($sql);

echo productList2($STH);
//end print list

?>
	<div id="cart"></div>
	<a href="?action=empty">Empty cart</a>
	<br>
	
</body>
</html>


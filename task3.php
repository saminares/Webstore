<?php 
session_start(); 
//SSL 
require_once('common/functions.php'); 

//DB connection 
require_once('common/dbConnect.php'); 

//DB functions 
require_once('common/dbFunctions.php'); 

//Check logged 
if(!$_SESSION['logged']) 
{ 
    redirect('index.html'); 
} 
echo ("<h2>You are logged in as Admin!</h2>"); 

//Query 
$sql = "SELECT * FROM Products;"; 
$STH = $DBH->query($sql); 

//Echo table 
echo editList($STH); 

?>
<a href="additem.php">Add new item to Webstore</a>
<br>
<a href="logout.php">Logout</a>
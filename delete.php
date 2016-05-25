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
    redirect('task2.php'); 
} 

//Execute deletion 
if($_GET['id']) 
{ 
    $id = $_GET['id'];  

    $delete = "DELETE FROM lab3 WHERE id='$id'";  
    $STH = $DBH->query($delete);  

    echo "Product deleted<br /><a href=\"task3.php\">Back to products</a>"; 
} 
else 
{ 
    redirect('task3.php'); 
} 
?>
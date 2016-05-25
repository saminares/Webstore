<?php
session_start(); 
require_once('common/dbConnect.php'); 
require_once('common/dbFunctions.php');

//Get username and password from form.html and run check_user from dbfunctions.php
$user = $_POST['username'];
$pass = $_POST['password'];
if(check_user($user, $pass, $DBH) == 2) 
{ 
    $_SESSION['logged'] = true; 
	$_SESSION['username'] = $user; 
    return header( 'Location: task3.php' );
}
else if(check_user($user, $pass, $DBH) == 1) 
{ 
    $_SESSION['logged'] = true; 
	$_SESSION['username'] = $user; 
    return header( 'Location: task1.php' );
} 
else 
{ 
    $_SESSION['logged'] = false; 
    return header( 'bad.jpg' );
} 

?>
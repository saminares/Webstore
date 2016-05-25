<?php 
require_once('common/functions.php'); 

session_start(); 

session_destroy(); 

redirect('index.html'); 

?>
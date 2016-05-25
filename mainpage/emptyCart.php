<?php
//empty cart
session_start();
unset($_SESSION['cart']);
//end empty cart
echo '<h4>Cart emptied.</h4>';
?>
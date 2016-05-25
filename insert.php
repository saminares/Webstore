<?php
$con=mysqli_connect("mysql.metropolia.fi","saminar","mysql","saminar");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$pw = $_POST["password"];
$password = hash ('sha256', $pw);

$cecn = $_POST["ccnumber"];
$Ccn = hash ('sha256', $cecn);

$cecsn = $_POST["ccsnumber"];
$Ccsn = hash ('sha256', $cecsn);


$sql="INSERT INTO Customers(FirstName, LastName, Adress1, City, PostalCode, Country, Phone, Email, Password, CreditCardSecNumber, CreditCardNumber, CardExpMonth, CardExpYear, Username)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[adress]','$_POST[city]','$_POST[pcode]','$_POST[country]','$_POST[phone]','$_POST[email]'
,'$password','$Ccn','$Ccsn','$_POST[ccexmp]','$_POST[ccexpy]','$_POST[username]')";

if (!mysqli_query($con,$sql))
  {
  die(mysqli_error());
  }
echo "Account created, login <a href=\"index.html\">here!</a>";

mysqli_close($con);
?>
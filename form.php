<html>

<body onload='document.form.email.focus()'> 

<form action="insert.php" name="form" method="post">
First Name: <input type="text" name="fname">
<br>
Last Name: <input type="text" name="lname">
<br>
Adress: <input type="text" name="adress">
<br>City: <input type="text" name="city">
<br>Postal Code: <input type="text" name="pcode">
<br>Country: <input type="text" name="country">
<br>Phone: <input type="text" name="phone">
<br>Email: <input type="text" name="email">
<br>Username: <input type="text" name="username">
<br>Password: <input type="password" name="password">
<br>Credit Card number: <input type="password" name="ccnumber">
<br>Credit Card Security Number: <input type="password" name="ccsnumber">
<br>Credit Card expiration month: <input type="text" name="ccexpm">
<br>Credut Card expiration year: <input type="text" name="ccexpy">
<br>
<input type="submit" onclick="ValidateEmail(document.form.email)">

</form>
<script src="common\email-validation.js"></script> 
</body>
</html>
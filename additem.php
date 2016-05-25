<?php 
require_once('common/dbConnect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>New Item</title>
</head>
<body>
<?php

//Not sure what this does
if (!isset($_POST['sent']) ) :
    

?>
<form action="task3.php" method="post">
CategoryID:<input type="text" name="1" />
<br />
Price:<input type="text" name="2" />
<br />
Album:<input type="text" name="3" />
<br />
Genre:<input type="text" name="4" />
<br />
Artist:<input type="text" name="5" />
<br />
Year:<input type="text" name="6" />
<br />
<input type="submit" value="send" name="sent" />
</form>
<?php 
else :

    //saves inputted fields into variables and makes them an array
    $categoryid = $_POST['1'];
    $price = $_POST['2'];
    $album = $_POST['3'];
    $genre = $_POST['4'];
	$artist = $_POST['5'];
	$year = $_POST['6'];
	//$art = $_POST['7'];
    $data = array($categoryid, $price, $album, $genre, $artist, $year, $art);
    

    //Inserts array into table, values from $data
    $STH = $DBH->prepare("INSERT INTO Products (CategoryID, Price, Album, Genre, Artist, Year) VALUES(?,?,?,?,?,?)");
    $STH->execute($data);
    endif
    ?>
</body>
</html>
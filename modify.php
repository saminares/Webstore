<?php 
session_start();  
//SSL 
require_once('common/functions.php'); 

//DB connection 
require_once('common/dbConnect.php'); 

if(!$_SESSION['logged']) 
{ 
    redirect('task2.php'); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8" /> 
<title>Modify</title> 
</head> 
<body> 
<?php 
//Check if the form hasn't been submitted 
if (!isset($_POST['sent']) ) : 
    //Check if ID is set 
    if($_GET['id']) : 
     
        $id = $_GET['id']; 
         
        $sql = "SELECT CategoryID, Price, Album, Genre, Artist, Year FROM Products where ProductID =$id"; 
        $STH = @$DBH->query($sql); 
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $row = $STH->fetch(); 
?> 
         
<form action="modify.php" method="post" enctype="multipart/form-data"> 
<strong>Modify a product</strong><br />Select category: <br /> 
<select name="category"><option value="1">Electronics</option><option value="2">Household</option><option value="3">Hygiene</option></select> 
<br />Album: <br /><input    name="Album"  type="text" value="<?php echo $row['Album'] ?>" size="40" /> 
<br />Price: <br /><input    name="price"  type="text" value="<?php echo $row['Price'] ?>" size="40" /> 
<br />Genre: <br /><input    name="genre"  type="text" value="<?php echo $row['Genre'] ?>" size="40" /> 
<input name="id" type="hidden" value="<?php echo $row['id'] ?>" /> 
<br /><br /><input name="sent" type="submit" value="Submit" /> 
</form> 
         


<?php  
    else : 
        //Echo result 
        echo ("ID not given<br /><a href=\"task3.php\">Back to products</a>"); 
    endif; 
//else submit the form 
else : 

    //Fetch the values 
    $name = $_POST['Album']; 
    $pri = $_POST['price']; 
    $desc = $_POST['genre']; 
    $cat = $_POST['category']; 
    $id = $_POST['id']; 
     
    //Do the update 
    $data = array($name, $pri, $desc, $cat, $id); 
    $STH = @$DBH->prepare("UPDATE lab3 SET product=?, price=?, description=?, category=? WHERE id=?"); 
    $STH->execute($data); 
     
    //Echo result 
    if($STH) 
    { 
        echo "Product modified<br /><a href=\"task3.php\">Back to products</a>"; 
    } 
    else 
    { 
        echo 'Error while updating'; 
    }     
     
endif; 
?> 
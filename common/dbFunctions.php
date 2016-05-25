<?php


//if username and password find a match in query, redirect to task1.php, otherwise show bad.jpg
function check_user($user, $pass, $DBH) {
	$hashpwd = hash('sha256', $pass);
	$sql= "SELECT * FROM Customers WHERE  
	Password = '$hashpwd' AND Username ='$user'";
	$STH = @$DBH->query($sql);
	if($STH->rowCount() > 0){
		if($row = $STH->fetch())
		{
			if($row['Admin'])
			{
				return 2;
			}
			else
			{
				return 1;
			}
		}
		
	} else {
		return header( 'Location: bad.jpg' );
	}
}
//
//function check_admin($user, $pass, $DBH) {
	//$hashpwd = hash('sha256', $pass);
	//$sql= "SELECT * FROM Customers WHERE Email='$user' AND active = 1 AND
	//Password = '$hashpwd'";
	//$STH = @$DBH->query($sql);
	//if($STH->rowCount() > 0){
	//	return true;
	//} else {
//		return header( 'Location: bad.jpg' );
//	}
//}

function productList($STH) {
	$STH->setFetchMode(PDO::FETCH_NUM);
	// Start the table
	$resultHTML = "<table border=\"1\">\n<tr>\n";

	// Output the table header
	$fieldCount = $STH->columnCount(); // number of columns
	
	for ($i=1; $i < $fieldCount; $i++) {
		$meta = $STH->getColumnMeta($i); // names of the fields
		$rowName = $meta['name'];
		$resultHTML .= "<th>$rowName</th>\n";
	} # end for

	$resultHTML .= "</tr>\n";
	
	// Output the table data
	while ($row = $STH->fetch()) {
	$resultHTML .= "<tr>\n";
	for ($i = 1; $i < $fieldCount; $i++)
	   $resultHTML .= "<td>".htmlentities($row[$i])."</td>\n";
	
	// ADD A CELL WITH LINK 'add to cart' HERE
	$resultHTML .= '<td><a href="?id='.$row[0].'">add to cart</a></td>'."\n";
	$resultHTML .= "</tr>\n";
	
} # end while
	
	// Close the table
	$resultHTML .= "</table>\n";
	
	return $resultHTML;

}



function productList2($STH) {
	$STH->setFetchMode(PDO::FETCH_NUM);
	// Start the table
	$resultHTML = "<table border=\"1\">\n<tr>\n";

	// Output the table header
	$fieldCount = $STH->columnCount(); // number of columns
	
	for ($i=1; $i < $fieldCount; $i++) {
		$meta = $STH->getColumnMeta($i); // names of the fields
		$rowName = $meta['name'];
		$resultHTML .= "<th>$rowName</th>\n";
	} # end for

	$resultHTML .= "</tr>\n";
	
	// Output the table data
	while ($row = $STH->fetch()) {
	$resultHTML .= "<tr>\n";
	for ($i = 1; $i < $fieldCount; $i++)
	   $resultHTML .= "<td>".htmlentities($row[$i])."</td>\n";
	
	// ADD A CELL WITH LINK 'add to cart' HERE
	$resultHTML .= "<td><a href=\"javascript:addToCart(".$row[0].")\">add to cart</a></td>"."\n";
	$resultHTML .= "</tr>\n";
	
} # end while
	
	// Close the table
	$resultHTML .= "</table>\n";
	
	return $resultHTML;

}








function editList($STH) {
	$STH->setFetchMode(PDO::FETCH_NUM);
	// Start the table
	$resultHTML = "<table border=\"1\">\n<tr>\n";

	// Output the table header
	$fieldCount = $STH->columnCount(); // number of columns
	
	for ($i=1; $i < $fieldCount; $i++) {
		$meta = $STH->getColumnMeta($i); // names of the fields
		$rowName = $meta['name'];
		$resultHTML .= "<th>$rowName</th>\n";
	} # end for

	$resultHTML .= "</tr>\n";
	
	// Output the table data
	while ($row = $STH->fetch()) {
	$resultHTML .= "<tr>\n";
	for ($i = 1; $i < $fieldCount; $i++)
	   $resultHTML .= "<td>".htmlentities($row[$i])."</td>\n";
	
	// FOR HOMEWORK 3 ADD THE LINKS HERE
	$resultHTML .= '<td><a href="modify.php?id='.$row[0].'">Modify</a></td>'."\n";
	$resultHTML .= '<td><a href=delete.php?id='.$row[0].'">Delete</a></td>'."\n";
	$resultHTML .= "</tr>\n";
	
} # end while
	
	// Close the table
	$resultHTML .= "</table>\n";
	
	return $resultHTML;

}


?>
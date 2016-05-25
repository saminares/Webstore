<?php

function check_user($user, $pwd, $DBH) {
	$hashpwd = hash('sha256', $pwd);
	$sql = "SELECT * FROM users WHERE user='$user' AND
	password = '$hashpwd'";
	$STH = @$DBH->query($sql);
	if($STH->rowCount() > 0){
		return true;
	} else {
		return false;
	}
}

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
		$resultHTML .= "<td><a href=\"?ID=".$row[0]."\">add to cart</a></td>";
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
		$resultHTML .= "<td><a href=\"javascript:addToCart(".$row[0].")\">add to cart</a></td>";
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
	$resultHTML .= "<td><a href=\"?action=modify&ID=".$row[0]."\">Modify</a></td>";
    $resultHTML .= "<td><a href=\"?action=delete&ID=".$row[0]."\">Delete</a></td>";

	
	$resultHTML .= "</tr>\n";
	
} # end while
	
	// Close the table
	$resultHTML .= "</table>\n";
	
	return $resultHTML;

}

function makeList($STH) {
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
		
	} # end while
	
	// Close the table
	$resultHTML .= "</table>\n";
	
	return $resultHTML;

}
?>
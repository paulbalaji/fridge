<?php
include("includes/meta.php");

$pID = $_GET['pID'];
$itemID = -1;
$customItemName = $_GET['customItemName'];


$query = "SELECT * FROM lists WHERE customItemName = '$customItemName'";
$result = mysql_query($query) or die(mysql_error());
$present = false;

while($row = mysql_fetch_array($result)) {
	$present = true;	
}
if(!$present) {

$query = "INSERT INTO lists(pID, itemID, customItemName) VALUES ( $pID, $itemID, '$customItemName')";
mysql_query($query) or die(mysql_error());
}


?>
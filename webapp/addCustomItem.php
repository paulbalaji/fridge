<?php
include("includes/meta.php");

$pID = $_POST['pID'];
$itemID = -1;
$customItemName = $_POST['customItemName'];


$query = "SELECT * FROM lists WHERE customItemName = '$customItemName'";
$result = mysql_query($query) or die(mysql_error());
$present = false;

while($row = mysql_fetch_array($result)) {
	echo "hi";
	$present = true;	
}
if(!$present) {

$query = "INSERT INTO lists(pID, itemID, customItemName) VALUES ( $pID, $itemID, '$customItemName')";
mysql_query($query) or die(mysql_error());
}

Header("Location:index.php");

?>
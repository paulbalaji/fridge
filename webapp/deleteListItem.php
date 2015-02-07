<?php
include("includes/meta.php");
#$stmt = $dbh->prepare("DELETE FROM lists WHERE pID=? AND itemID=?");
#$stmt->bindParam(1, $pID);
#$stmt->bindParam(2, $itemID);

$pID = $_GET["pID"];
$itemID = $_GET["itemID"];
$itemString = $_GET["customItemName"];

if($itemID < 1) {
    $deleteRow = "DELETE FROM lists WHERE pID=$pID AND customItemName=$itemString";
} else {
    $deleteRow = "DELETE FROM lists WHERE pID=$pID AND itemID=$itemID";    
}

mysql_query($deleteRow) or die(mysql_error());

#$stmt->execute();

?>

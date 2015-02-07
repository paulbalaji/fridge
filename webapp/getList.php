<?php
#connect to MySQL
include("includes/meta.php");

$query = "SELECT itemID FROM lists WHERE pID=$pID";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    $itemID = $row['itemID'];
    $subQuery = "SELECT itemName from items WHERE itemID=$itemID";
    
    $subResult = mysql_query($subQuery) or die(mysql_error());
    $itemName = $subResult['itemName'];

    echo "<li>$itemName</li>";
}
?>

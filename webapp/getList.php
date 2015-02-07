<ul>

<?php
#connect to MySQL
include("includes/meta.php");

$query = "SELECT itemID FROM lists WHERE pID=$pID";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    $itemID = $row['itemID'];
    $subQuery = "SELECT * from items WHERE itemID=$itemID";
    
    $result2 = mysql_query($subQuery) or die(mysql_error());
    $subResult = mysql_fetch_array($result2);
    
    $itemName = $subResult['itemName'];
    
    echo "<li id = '$itemID'>#$itemID : $itemName</li>";
}
?>
    
</ul>


<?php
#connect to MySQL
include("includes/meta.php");

#$stmt = $dbh->prepare("SELECT itemID FROM lists WHERE pID=?");
#$stmt->bindParam(1, $result, PDO::PARAM_STR, $safeID);
#$safeID = $pID;
#stmt->execute();

$query = "SELECT * FROM lists WHERE pID=$pID";
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    #$stmt2 = $dbh->prepare("SELECT * FROM items WHERE itemID=?");
    #$stmt2->bindParam(1, $result2, PDO::PARAM_STR, $itemID);
    $itemID = $row['itemID'];
    #stmt2->execute();
	
	  $subQuery = "SELECT * from items WHERE itemID=$itemID"; 
    $result2 = mysql_query($subQuery) or die(mysql_error());
    
    $row2 = mysql_fetch_array($result2);
	
	if($itemID == "-1") {
		

    $itemName = $row['customItemName'];	
  
	}else {
		  $itemName = $row2['itemName'];
	}
    
    echo "<li id = '$itemID'>$itemName</li>";
}
?>
    

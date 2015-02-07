<?php
include("includes/meta.php");

$pID = $_GET["pID"];
$itemID = $_GET["itemID"];

$deleteRow = "DELETE FROM lists WHERE pID=$pID AND itemID=$itemID";

mysql_query($deleteRow) or die(mysql_error());

?>

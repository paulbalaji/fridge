<?php

include("includes/meta.php");

$query = "INSERT INTO lists (pID, itemID) VALUES ($pID, $i)";
$emailAdd = mysql_query($query) or die(mysql_error());

?>

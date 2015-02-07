<?php
include("includes/meta.php");

for ($i = 1 ; $i <= 9 ; $i++) {
    $query = "INSERT INTO lists (pID, itemID) VALUES ($pID, $i)";
    mysql_query($query) or die(mysql_error());
}

?>

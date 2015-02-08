<?php

include("includes/meta.php");

$query = "SELECT email FROM devices WHERE pID=$pID";
$result = mysql_query($query) or die(mysql_error());
$emailID = $result['email'];

?>

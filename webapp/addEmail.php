<?php

include("includes/meta.php");

#$emailID = "paulmonish@gmail.com";
$query = "SELECT email FROM devices WHERE pID=$pID";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$emailID = $row['email'];

?>

<?php
include("includes/meta.php");

$pID = $_GET["pID"];
$email = $_GET["email"];
$update = "UPDATE devices SET email='$email' WHERE pID=$pID";

mysql_query($update) or die(mysql_error());

?>

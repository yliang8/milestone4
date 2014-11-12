<?php

session_start();

$EtId = microtime(true); //Generate Event Id Using Unix Time
$locFrom= $_POST['locFrom'];
$locTo = $_POST['locTo'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
$maxRiders = $_POST['maxRiders'];


/* Connect to the database */
include "function.php";
$conn=connDB();
$sql = "Insert into sellerEt values ('$EtId', '$locFrom','$locTo',
	'$timeFrom','$timeTo','0','$maxRiders','0')";
if ($conn->query($sql) == TRUE)
{
	header('Location: Home.php?DriverOffer=1');
}
else
{
	header('Location: Home.php?DriverOffer=0');
}
$conn->close();

?>
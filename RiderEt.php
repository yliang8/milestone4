<?php

session_start();

$EtId = microtime(true); //Generate Event Id Using Unix Time
$locFrom = $_POST['locFrom'];
$locTo = $_POST['locTo'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
echo $locFrom."\n".$locTo."\n".$timeFrom."\n".$timeTo;

$riderId = $_SESSION['id'];

include "function.php";
$conn=connDB();
$sql = "Insert into buyerEt values ('$EtId', '$locFrom','$locTo',
		'$timeFrom','$timeTo','0', '$riderId')";

if ($conn->query($sql) == TRUE)
{
	//header('Location: Home.php?RiderRequest=1');
}
else
{
	//header('Location: Home.php?RiderRequest=0');
}	
$conn->close();
?>

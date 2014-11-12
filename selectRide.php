<?php

session_start();

$etid = $_POST['EtId'];

include "function.php";
$conn=connDB();

$riderId = $_SESSION['id'];
$eventId = $_POST['EtId'];

$results = $conn->query("INSERT INTO sellerEtBuyers VALUES ('$eventId', '$riderId')");

if($results){
    print 'Success! record updated / deleted'; 
}else{
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
}

$conn->close();

?>

<?php
include "function.php";

$conn=connDB();

$query = "Select * from sellerEt";
$result = mysqli_query($conn,$query);

$array = array(); // initialize
while($row = $result->fetch_array(MYSQLI_BOTH)) {
  $array[] = array(
    'EtId'       => $row[0],
    'locFrom' => $row[1],
    'locTo' => $row[2],
    'timeFrom'     => $row[3],
    'timeTo'     => $row[4],
    'listBuyerId' => $row[5],
    'maxBuyers'  => $row[6],
    'active' => $row[7]
  );

}
header('Content-Type: application/json');
echo json_encode($array);
$conn->close();
?>
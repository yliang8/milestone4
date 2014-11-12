<h1>I AM NOT INSANE</h1>

<div id="table_admin" class="span7">
        <h4>Buyer (Rider) History</h4>

        <table class="table table-striped table-condensed">
        		<thead>
                <tr>
                <th>Pick-Up Place&nbsp;</th>
                <th>Destination&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Time From</th>
                <th>Time To</th>
                </tr>
                </thead>
<?php
include "function.php";

$conn=connDB();

$query = "Select * from buyerEt";
$result = mysqli_query($conn,$query);

if ($_SESSION['type'] != 2) {
    die("not a rider");
}
$riderId = $_SESSION['id'];
$riderRequestedEvents = mysqli_query($conn, "SELECT * FROM buyerEt WHERE riderId='$riderId'");
$riderScheduledEvents = mysqli_query($conn, "SELECT EtId FROM sellerEtBuyers WHERE riderId='$riderId'");

$array = array(); // initialize
while($row = $result->fetch_array(MYSQLI_BOTH)) {
  echo'<tbody>';
                echo'<tr>'; 
                echo'<td>'. $row['locFrom']."</td>";
                echo'<td>'. $row['locTo'].'</td>';
                echo'<td>'. $row['timeFrom'].'</td>';
                echo'<td>'. $row['timeTo'].'</td>';
                echo'<tr>';
                echo'</tbody>';

}
// header('Content-Type: application/json');
// echo json_encode($array);
$conn->close();
?>


    	</table>

</div>
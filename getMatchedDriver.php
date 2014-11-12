<?php session_start(); ?>

<div id="table_admin" class="span7">
    
    <h3>Matched Rides from Drivers</h3>
    <table class="table table-striped table-condensed">
		<thead>
            <tr>
                <th>Pick-Up Place&nbsp;</th>
                <th>Destination&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Driver ID</th>
                <th>Event ID</th>
                <th>Join&nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "function.php";
                $conn=connDB();
                $riderId = $_SESSION['id'];
                $riderRequestedEvents = mysqli_query($conn, "SELECT * FROM buyerEt WHERE riderId='$riderId'");
                // this is all the events the rider has requested ... riderRequestedEvents
                $riderHistoryEvents = array();
                while ($row = mysqli_fetch_assoc($riderRequestedEvents))
                {
                    array_push($riderHistoryEvents, "<tr><td>$row[EtId]</td><td>$row[locFrom]</td><td>$row[locTo]</td><td>$row[timeFrom]</td><td>$row[timeTo]</td></tr>");
                    $location = strtoupper($row['locFrom']);
                    $driverOfferedEvents = mysqli_query($conn, "SELECT * FROM sellerEt WHERE UPPER(locFrom) LIKE '%$location%'");
                    while ($row2 = mysqli_fetch_assoc($driverOfferedEvents))
                    {
                        echo'<tr>';
                        echo'<td>'. $row2['locFrom'].'</td>';
                        echo'<td>'. $row2['locTo'].'</td>';
                        echo'<td>'. $row2['timeFrom'].'</td>';
                        echo'<td>'. $row2['timeTo'].'</td>';
                        echo'<td>'. $row2['driverId'].'</td>';
                        echo'<td>'. $row2['EtId'].'</td>';
                        echo'<td><button onclick="riderJoinEvent('.$row2['EtId'].')">'.'Click to join'.'</button></td>';
                        echo'<tr>';
                    }
                }
            ?>
        </tbody>
    </table>

    <h3>Rider History</h3>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Location From</th>
                <th>Location To</th>
                <th>Time From</th>
                <th>Time To</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($riderHistoryEvents as $riderHistoryEvent)
                {
                    echo $riderHistoryEvent;
                }   
            ?>
        </tbody>
    </table>

    <h3>Your Scheduled Rides</h3>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>Pick-Up Place&nbsp;</th>
                <th>Destination&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Driver ID</th>
                <th>Event ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $riderScheduledEvents = mysqli_query($conn, "SELECT * FROM sellerEtBuyers WHERE riderId='$riderId'");
                while ($row3 = mysqli_fetch_assoc($riderScheduledEvents))
                {
                    $eventId = $row3['EtId'];
                    $riderScheduledEventsInfo = mysqli_query($conn, "SELECT * FROM sellerEt WHERE EtId='$eventId'");
                    while ($row4 = mysqli_fetch_assoc($riderScheduledEventsInfo))
                    {
                        echo'<tr>';
                        echo'<td>'. $row4['locFrom'].'</td>';
                        echo'<td>'. $row4['locTo'].'</td>';
                        echo'<td>'. $row4['timeFrom'].'</td>';
                        echo'<td>'. $row4['timeTo'].'</td>';
                        echo'<td>'. $row4['driverId'].'</td>';
                        echo'<td>'. $row4['EtId'].'</td>';
                        echo'<tr>';
                    }
                }
            ?>
        </tbody>
    </table>
</div>
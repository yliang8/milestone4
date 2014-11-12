<?php
	if ($_SESSION['type'] == 1) // driver
	{
		include "driverDiv.php";
	}
	else if($_SESSION['type'] == 2) //rider
	{
		include "riderDiv.php";
	}
	else if($_SESSION['type'] == 3) //both
	{
		include "driverDiv.php";
		include "riderDiv.php";
	}
?>
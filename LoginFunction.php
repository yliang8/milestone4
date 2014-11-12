<?php
// die("hit");
session_start();

/* Get the variables passed from newIndex.php, and hash the password. */
$email = $_POST['email'];
$password = $_POST['password'];
$hash = md5($password);

/* Check if the user is in Database */
include "function.php";
$conn=connDB();

$query = "SELECT * FROM info where email= '$email' and hashpw='$hash'";
$result = mysqli_query($conn,$query);
if ($row = mysqli_fetch_assoc($result))
{
	if($row['email'] == $email)
	{
		/* If the creditials are correct, start session, and the session. */
		$_SESSION['email'] = $email;
		$_SESSION['type'] = $row['type'];
		$_SESSION['id'] = $row['id'];
		$duration = 30 * 60 * 60 * 24 ; 
		setcookie("email", $email, time() + $duration,'/');
		setcookie("password", $password, time() + $duration,'/');
		header('Location: Home.php');
	}
	else
	{
		/* Redirect back to hearder.php */
		cleanCookie();
		header('Location: pre-header.php?err=1');
		/* The die() function prints a message and exits the current script. */
	}
}
else
{
	/* destroy cookie */
	cleanCookie();
	header('Location: Home.php?err=1');
}
?>



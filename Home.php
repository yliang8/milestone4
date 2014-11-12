<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "CSS/style.css">
</head>
<body>
<?php
	if (isset($_SESSION['email'])) // logged in
	{
		include "post-header.php";
		include "ProfileBody.php";
	}
	else // not logged in
	{
		include "pre-header.php";
		include "homeBody.php";
	}
?>
</body>
</html>
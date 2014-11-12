<div id="bar">
	<p>
		<span><img src="images/orange_logo_small.png" alt="Logo">WheelSharing</span>
	 	<div id="barInput">
	 	<span> Welcome back! 
	 	<?php
		echo $_SESSION['email'];
		?>
		!
	 	</span>
	 	<input type="button" onClick="window.location='LogoutFunction.php';" name="Logout" value="Logout" class="button-secondary"/>
  	</p>
</div>



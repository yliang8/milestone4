<div id="bottom_left">
	<p><h1>A website to match buyers and sellers of car rides</h1></p>
</div>


<div id="bottom_right">
<!--Content to explain what wheels share is-->
Sign Up:<br>
<form action = 'SignUp.php' method = 'POST'>
Email: <input type='text' name = 'email'/>
<br>
Password: <input type='password' name = 'password'/>
<br>
Re-Confirm Password: <input type='password' name = 'Re-Password'/>
<br>
You are a 
<select name='type'>
  <option value="1">Driver</option>
  <option value="2">Rider</option>
  <option value="3">Both</option>
</select>
<br>
<input type='submit' value = 'SignUp'/>
<br>
</form>
<?php
if (isset($_GET['success']) && $_GET['success'] == 1)
{
  echo '<span style="color: green;">Account created successfully</span><br/>';
}
if (isset($_GET['success']) && $_GET['success'] == 0)
{
  echo '<span style="color: red;">Account creation failed</span><br/>';
}
?>
</div>

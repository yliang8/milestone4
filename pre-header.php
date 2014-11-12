
<div id="bar">
  <form class="login" action = 'LoginFunction.php' method = 'POST' name='logInTo'>
  <!-- div id="barInput"> -->
  <p>
    <span><img src="images/orange_logo_small.png" alt="Logo">WheelSharing</span>
    <div id="barInput">
    <label><span>Email</span>
    <input class="text" name="email" type="text" id="user_login" placeholder="email" size="13" maxlength="40" value="" />
    </label>
    <label><span>Password</span>
    <input class="text" name="password" type="password" id="password" placeholder="password" size="13" maxlength="100" />
    </label>
    <input name="re" type="hidden" value=""/>
    <input type="submit" class="button-secondary" name="Submit" value="LogIn" />
    </div>
  </p>
  <?php
    if (isset($_GET['err']))
    {   
      echo '<br><span style="color: red;">Incorrect credentials</span><br/>';
    }
  ?>
</form>
</div>

<!-- Function to Check Cookie -->
<script type="text/javascript">
  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
  }

  function checkCookie()
  {
    var email=decodeURIComponent(getCookie("email"));
    var password=decodeURIComponent(getCookie("password"));
    /* Cookie is set */
    if(email!="" && password!="")
    {
      document.forms["logInTo"].email.value = email;
      document.forms["logInTo"].password.value = password;
      document.forms["logInTo"].submit();
    }
  }
  checkCookie();
</script>



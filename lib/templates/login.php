<?php

if($_POST['login_admin']) $h1 = '<h1>Wrong access</h1>';

?>

<?=$h1?>

<form method="post">
  
  <dl>
  	<dt>Login</dt>
    <dd><input name="email" type="text" ></dd>
  	<dt>Password</dt>
    <dd><input name="password" type="password" ></dd>
  </dl>
  
  <input name="login_admin" type="submit" value="Enter" >

</form>


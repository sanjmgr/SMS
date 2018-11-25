<?php
session_start();
if(isset($_SESSION['signup'])){
unset($_SESSION['signup']);
session_destroy();
}
?>
<form action="login_user.php" method="POST">
Log In<br />
Username:<input type="text" name="username" value="" />
Password:<input type="password" name="password" value="" />
<input type="submit" name="submit" />
</form>
<form action="signup.php" method="POST">
Register<br/ >
AdminName:<input type="text" name="admin" value="">
Password:<input type="password" name="apassword" />
<input type="submit" name="adminpg" value="Go To Admin" />
</form>
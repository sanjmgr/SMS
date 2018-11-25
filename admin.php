<?php
session_start();
if(isset($_SESSION['signup']))
{?>
<form action="register.php" method="POST">
Register Here
<input type="text" name="username" value="username" />
<input type="password" name="password" value="password" />
<input type="password" name="repassword" value="repassword" />

<input type="text" name="user_status" value="student" />
<input type="submit" name="register"  value="Register"/>
</form>
<?php
}
else{
	header("Location:login.php");
}
?>
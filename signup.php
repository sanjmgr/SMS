<?php
include_once('classes/connection.php');
	include_once('classes/manageuser.php');
	$sign=new ManageUsers();
	$user=$_POST['admin'];
	$passw=$_POST['apassword'];
	$entry=$sign->admin($user,$passw);
if($entry==1){
	session_start();
	$_SESSION['signup']=true;
	if(isset($_SESSION['signup'])){
		header("Location:admin.php");
	}
}
else{
	echo "Invalid username or password.";
	?>
	<form action="login.php" method="POST">
	<input type="submit" name="retry" value="Retry!">
	</form>
	<?php
}
?>
<?php
session_start();
global $ip,$name,$date,$time,$stat,$info;
include_once('classes/userconnection.php');
	include_once('classes/userclass.php');
	$info= new UserClass();
	$user=$_SESSION['uname'];
	$result=$info->GetUserInfo($user);

	foreach($result as $uinfo)
	{
		$name=$uinfo['username'];
		$ip= $uinfo['ip_address'];
		$date= $uinfo['date'];
		$time=$uinfo['time'];
		$stat= $uinfo['user_status'];
	}
if(!isset($_SESSION['loggedin']))
	header("Location:login.php");
if(isset($_POST['logout'])){
     unset($_SESSION['loggedin']);
	session_destroy();
	//die();
header("Location:login.php");
}

echo "Welcome  ".$name."<br />";
echo "Your ip-address is ".$ip." and you enrolled in ".$date." at ".$time." as a ".$stat.".";
?>
<form action="<?php $_PHP_SELF ?>" method="POST">
<input type="submit" name="logout" value="Log Out" />
<br/>
</form>
<form action="<?php $_PHP_SELF ?>" method="POST">
Change Your Password:
<br/>
Enter new Password:   <input type="password" name="cpass" /><br/>
Re-Enter the password:<input type="password" name="acpass" /><br />
<input type="submit" name="changepass" value="change Password" />
</form>
<?php
if(isset($_POST['changepass'])){
	$newpass=$_POST['cpass'];
	$rnewpass=$_POST['acpass'];
	if($newpass==$rnewpass){
	$conf=$info->ChangePassword($name,$newpass);
	if($conf==1)
	{
		echo "Password Changed";
	}
	else{
		echo "Coldnot change password!";
	}
	}
	else{
		echo "Re-password didnot match!";
	}
}
?>

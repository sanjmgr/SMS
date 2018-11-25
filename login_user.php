<?php
if(isset($_POST['submit'])){
	session_start();
	include_once('classes/userconnection.php');
	include_once('classes/userclass.php');
	 $username =$_POST['username'];
	$password=$_POST['password'];
	if(empty($username) || empty($password))
	{
		echo "Enter correct username and password!";
	}
	else{
		$users= new UserClass();
$check=$users->LoginUsers($_POST['username'],$_POST['password']);
if($check==1){
	//$info=$users->GetUserInfo($_POST['username']);
	$make_sessions=$users->GetUserInfo($username);
			
				$_SESSION['loggedin'] =true;
				$_SESSION['uname']=$_POST['username'];
				if(isset($_SESSION['loggedin']))
				{
					header("location:home.php");
				}
			
			
        }

else{
	echo "Invalid username or password!";
}
	}
}
?>
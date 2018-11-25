<?php
session_start();
if(!isset($_SESSION['signup']))
{
	header("Location:login.php");
}

if(isset($_POST['register'])){
	
	include_once('classes/connection.php');
	include_once('classes/manageuser.php');
	$username=$_POST['username'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$ip_address= $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set("Asia/Kathmandu");
	$date = date("Y:m:d");
	$time = date("h:i:sa");
	global $reg;
	$reg= new ManageUsers();
	if(empty($username) || empty($password) || empty($repassword) || empty($ip_address))
	{
		$error ='ALl fields are required!';
		echo $error;
	}
	elseif($password != $repassword)
	{
		$error='Password doesnot match with repassword!';
		echo $error;
	}
	elseif($reg->GetUserInfo($username)){
		echo "This username already exists, try registering with another username!";
		
	}
	else{
		
		$stat=$reg->RegisterUsers($username,$password,$ip_address,$time,$date,$_POST['user_status']);
		if($stat==1){
			$make_sessions=$reg->GetUserInfo($username);
			foreach($make_sessions as $userSessions)
			{
				$_SESSION['name'] = $userSessions['username'];
				if(isset($_SESSION['name']))
				{
					unset($_SESSION['signup']);
					unset($_SESSION['name']);
					session_destroy();
					header("location:login.php");
				}
			}
			
		}
	}
	
}
?>
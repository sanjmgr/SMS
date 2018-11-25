<?php

include_once('userconnection.php');
class UserClass{
  public $linku;
function __construct(){
	$db_connection=new udbConnection();
	$this->linku=$db_connection->connect();
	return $this->linku;
} 

function LoginUsers($username,$password){
	$query = $this->linku->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	$rowcount = $query->rowCount();
	return $rowcount;
}
function GetUserInfo($username){
	$query = $this->linku->query("SELECT * FROM users WHERE username = '$username'");
     $rowcount = $query->rowCount();   
   if($rowcount==1){
		$result=$query->fetchAll();
		return $result;
	}
	else{
		return $rowcount;
	}
	}
	function ChangePassword($username,$password){
	$query=$this->linku->prepare("UPDATE users  SET password='$password' WHERE username='$username'");
	
	$query->execute();
	$counts = $query->rowCount();
	return $counts;
}
 
}


?>
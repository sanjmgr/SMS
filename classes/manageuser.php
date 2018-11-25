<?php

include_once('connection.php');
include_once('userconnection.php');
class ManageUsers{
  public $link;
function __construct(){
	$db_connection=new dbConnection();
	$this->link=$db_connection->connect();
	return $this->link;
} 
function RegisterUsers($username,$password,$ip_address,$time,$date,$us){
	$query=$this->link->prepare("INSERT INTO users (username,password,ip_address,time,date,user_status) VALUES (?,?,?,?,?,?)");
	$values=array($username,$password,$ip_address,$time,$date,$us);
	$query->execute($values);
	$counts = $query->rowCount();
	return $counts;
}
function GetUserInfo($username){
	$query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
     $rowcount = $query->rowCount();   
   if($rowcount==1){
		$result=$query->fetchAll();
		return $result;
	}
	else{
		return $rowcount;
	}
	}
	function admin($username,$password){
	$query = $this->link->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
	$rowcount = $query->rowCount();
	return $rowcount;
}
 
 
}


?>
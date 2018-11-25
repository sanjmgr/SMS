<?php

class dbConnection{
protected $conn;
public $name='todo';
public $user='root';
public $pass='';
public $host='localhost:3306';

function connect(){
try{
$this->conn=new PDO("mysql:host=$this->host;dbname=$this->name",$this->user,$this->pass);
return $this->conn;
}
catch(PDOException $e){
return $e->getMessage();
}
}
}
?>
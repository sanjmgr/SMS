<?php

class udbConnection{
protected $connuser;
public $name='todo';
public $user='amit';
public $pass='patel';
public $host='localhost:3306';

function connect(){
try{
$this->connuser=new PDO("mysql:host=$this->host;dbname=$this->name",$this->user,$this->pass);
return $this->connuser;
}
catch(PDOException $e){
return $e->getMessage();
}
}
}
?>
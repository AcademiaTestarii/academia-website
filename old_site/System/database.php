<?php
class databaseConnection{	
private $server = 'localhost';
private $username = 'academia_form';
private $password = 'Fama4547145';
private $database = 'academia_form1';
protected $conn;

private $test;
public function __construct(){
try{

	$this->conn = new PDO("mysql:host=$this->server;dbname=$this->database;", $this->username, $this->password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
}
public function query($query){
	$result =$this->conn->query($query) ;
	//foreach ($result as $row) {
	//	print_r($row);
	//}
	return $result->fetch(PDO::FETCH_ASSOC);
}
}
?>
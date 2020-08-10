<?php
$server = 'localhost';
$username = 'academia_form';
$password = 'Fama4547145';
$database = 'academia_form1';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
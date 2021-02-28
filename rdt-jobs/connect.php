<?php

// php program by Eric Adamian
// connecting to phpmyadmin database

// database credentials
$hostname = 'localhost';
$database = 'admin_database';
$user_login = 'root';
$pass_login = '';
$pdo = null;

// creating a PHP Data Object (PDO) instance to access database
// catch exceptions thrown by PDO when it fails to connect to database 
try{
	$pdo = new PDO("mysql:host=$hostname; dbname=$database;", $user_login, $pass_login);
}catch (PDOException $e){
	echo 'Connection failed: ' . $e->getMessage() . '<br/>';
	die();
}

?>
<?php

// php program by Eric Adamian
// querying to phpmyadmin database

session_start();

// requires connection to database to query
require 'connect.php';

// declaring variables
$username=$_POST['usernameData'];
$password=$_POST['passwordData'];

// empty query case
if($username==''|| $password==''){
	echo 'fail'; 
	exit;
}

// database query; fetch username and password
$sth=$pdo->prepare("SELECT count(*) as credentials from login_table where username=? and password=?");
$sth->execute(array($username,$password));
$result=$sth->fetchAll();

// checks for result set in array (looking at the value)
// 1 represents credentials exists
if($result[0]['credentials']>='1'){
	echo 'pass';
	$_SESSION['user']='true';
	exit;
}else{
	echo 'fail';
	exit;
}

exit;

?>
<?php

// php program by Eric Adamian
// processing jobs passed (added/deleted) from table

session_start();

include 'connect.php';

// ADDING A JOB: executing prepared statement and redirecting

// ? represents wildcard for parameterization 
// ordering variables from left to right, then ? left to right (catches any exceptions)
$sql="insert into jobs_table (name,posting_date,description,experience,contact,link) values(?,?,?,?,?,?)";

$stmt=$pdo->prepare($sql);

try{
	$stmt->execute(array($_POST["name"],$_POST["posting_date"],$_POST["description"],$_POST["experience"],$_POST["contact"],$_POST["link"]));

	echo "here";
	header("location: admin.php");

}catch(Exception $e){
	die($e);
	exit;
}



// DELETING A JOB: executing prepared statement and redirecting

// based on array of jobs by selected id (catches any exceptions)
if(isset($_GET['id'])){
	$sql="delete from jobs_table where id=?";

	$stmt=$pdo->prepare($sql);

	try{
		$stmt->execute(array($_GET["id"]));
		echo "here";
		header("location: admin.php");
	}catch(Exception $e){
		die($e);
		exit;
	}
}

exit;

?>

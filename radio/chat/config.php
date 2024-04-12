<?php

$dbHost ='localhost';
$dbUsername ='root';
$dbPassword ='G4tosN3rds2505';
$dbDatabase ='radio';
/*
try{
	$conn = new PDO('mysql:host=localhost;dbname=radio', $dbUsername; $dbPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}*/
$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>
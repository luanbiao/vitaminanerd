<?php

include "config.php";
$dbUsername = 'root';
$dbPassword = 'G4tosN3rds2505';
@session_start();
if($_POST)
{
	$name=$_SESSION['name'];
    $message=$_POST['msg'];
    $admin=$_SESSION['admin'];
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		
	$inserir = $pdo->prepare('INSERT INTO chat (name, message, admin) VALUES (:name,:message,:admin)');
	$inserir->execute(array(
	':name' => $name,
	':message' => $message,
	':admin' => $admin
	));
	}
	//$sql="INSERT INTO `chat`(`name`, `message`, `admin`) VALUES ('".$name."', '".$msg."', '".$admin."')";
catch(PDOException $e){
	echo 'Não foi possível inserir o registro: ' . $e->getMessage();
	}
	//$query = mysqli_query($conn,$sql);
	if($inserir)
	{
	//echo "mensagem enviada.";
		header('Location: /radio/index.php');
	}
	else
	{
		echo "Sua mensagem não foi enviada.";
	}
	
	}
?>
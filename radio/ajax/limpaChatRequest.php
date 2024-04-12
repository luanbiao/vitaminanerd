<?php
	
include "config.php";

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('TRUNCATE TABLE `chat`');
	$inserir->execute(array(

		));

		echo "Chat esvaziado com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível esvaziar o chat: ' . $e->getMessage();
		}
?>
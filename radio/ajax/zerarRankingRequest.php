<?php
include "config.php";

try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('UPDATE register SET pontos = :pontos');
	$inserir->execute(array(
	':pontos' => 0
	));

		echo "Ranking zerado com sucesso";
		
		}
	catch(PDOException $e){
		echo 'Não foi possível zerar o ranking: ' . $e->getMessage();
		}
	
?>
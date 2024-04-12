<?php
	$id=$_POST["id"];
include "config.php";

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('DELETE FROM `chat` WHERE id = :id');
	$inserir->execute(array(
	':id' => $id,
		));
		echo "Mensagem excluída com sucesso.";
		}
	catch(PDOException $e){
		echo 'Não foi possível excluir a mensagem: ' . $e->getMessage();
		}
?>
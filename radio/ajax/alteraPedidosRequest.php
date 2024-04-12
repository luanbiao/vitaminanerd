<?php
include "config.php";

$id=$_POST["id"];
$incluido=$_POST["incluido"];
try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('UPDATE pedidos SET pedidos_incluido = :incluido WHERE pedidos_id = :id');
	$inserir->execute(array(
	':incluido' => $incluido,
	':id' => $id
	));

		echo "Atualização de pedido efetuada com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível atualizar o pedido: ' . $e->getMessage();
		}
	
?>
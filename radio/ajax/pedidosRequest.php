<?php
	@session_start();
include "config.php";
if (isset($_SESSION['name'])){
$usuario=($_SESSION['name']);
} else {
	$usuario = "Visitante";
}
$nome=$_POST["nome"];
$artista=$_POST["artista"];
$mensagem=$_POST["mensagem"];

		try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('INSERT INTO pedidos (pedidos_usuario, pedidos_musica, pedidos_artista, pedidos_mensagem) VALUES (:name,:musica,:artista,:mensagem)');
	$inserir->execute(array(
	':name' => $usuario,
	':musica' => $nome,
	':artista' => $artista,
	':mensagem' => $mensagem
		));

		echo "Pedido enviado com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível fazer o pedido: ' . $e->getMessage();
		}
?>
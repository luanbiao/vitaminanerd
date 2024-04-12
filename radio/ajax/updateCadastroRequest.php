<?php
include "config.php";

$nome=$_POST["nome"];
$pontos=$_POST["pontos"];
$email=$_POST["email"];
$admin=$_POST["admin"];
echo "<script>alert('".$nome."' '".$pontos."' '".$email."' '".$admin."')<script>)";
try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('UPDATE register SET name = :nome, email = :email, pontos = :pontos, admin = :admin WHERE name = :nome');
	$inserir->execute(array(
	':nome' => $nome,
	':pontos' => $pontos,
	':email' => $email,
	':admin' => $admin
		));

		echo "Atualização efetuada com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível atualizar o usuário: ' . $e->getMessage();
		}
	
?>
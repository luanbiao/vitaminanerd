<?php
include "config.php";
$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_POST){
$erro = 1;
$nick = strtolower($_POST['nick']);
$password = $_POST['senha'];
$stmt = $pdo->prepare("SELECT * FROM register WHERE name = ?");
$stmt->execute([$_POST['nick']]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password']))
{
     session_start();
			$erro = 0;
			$_SESSION['name'] = $user['name'];
			$_SESSION['admin'] = $user['admin'];
			$_SESSION['pontos'] = 0;	
			echo "Login efetuado com sucesso!";
} else {
    echo "Nick ou Senha errada";
}
}
?>


<?php
include "config.php";


$nome=$_POST["nick"];
$senha=$_POST["senha"];
$hash = password_hash($senha, PASSWORD_DEFAULT);
//$admin=$_POST["admin"];
//echo "<script>alert('".$nome."' '".$pontos."' '".$email."' '".$admin."')<script>)";
try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inserir = $pdo->prepare('UPDATE register SET password = :hash WHERE name = :nome');
	$inserir->execute(array(
	':nome' => $nome,
	':hash' => $hash
		));

		echo "Senha atualizada com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível atualizar a senha, tente novamente: ' . $e->getMessage();
		}
	
?>
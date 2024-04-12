<?php
include "config.php";
$check = 0;
$admin = 0;
$name = strtolower($_POST['nick']);
$email=$_POST['email'];
$password=$_POST['senha'];
$pontos = 0;

// BUSCA DUPLICATA NA HORA DO CADASTRO
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT name, pontos, email, admin FROM register");
	
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			if ($linha['name'] == $name){
			$check = 1;
			$admin = 1;
			}
		}
	} catch(PDOException $e){
	echo 'Não foi possível efetuar o select';
	}

if ($check == 0){
	$hash = password_hash($password, PASSWORD_DEFAULT);

		try {
		$inserir = $pdo->prepare('INSERT INTO register (name, password, email, pontos) VALUES (:name,:hash,:email,:pontos)');
	$inserir->execute(array(
	':name' => $name,
	':hash' => $hash,
	':email' => $email,
	':pontos' => $pontos
		));
		session_start();
		$_SESSION['name'] = $name;
		$_SESSION['admin'] = $admin;
		$_SESSION["pontos"] = 0;
	
		echo "Cadastro efetuado com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi efetuar o cadastro: ' . $e->getMessage();
		}
} else {
	echo 'Já existe alguém com esse nick';
}
/*
		
$conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
//$usuario=($_SESSION['name']);
$nick=$_POST["nick"];
$senha=$_POST["senha"];
$sql="INSERT INTO register (name, password, pontos) VALUES ('$nick', '$senha', 0)";
if($conn->query($sql)===TRUE){

    echo "Cadastro de " . $nick . " efetuado com sucesso.";
	$_SESSION['name'] = $nick;

	} else {
	echo "Erro no cadastro";
	}*/
?>
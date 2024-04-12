<?php
include "config.php";
$check = 0;
$check2 = 0;
$admin = 0;
$name = strtolower($_POST['nick']);
$email=$_POST['email'];

$pontos = 0;

// BUSCA DUPLICATA NA HORA DO CADASTRO
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT name, email FROM register");
	
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			if (($linha['name'] == $name) && ($linha['email'] == $email)){
			$check = 1;
			$nick = $linha['name'];
			echo $linha['name'];
			}
			
		}
		if ($check != 1){
			echo "Usuário ou e-mail incorretos.";
			}
	} catch(PDOException $e){
	echo 'Não foi possível acessar a base de usuários.';
	}
/*
if ($check == 1){
	$date = new DateTime();
	//echo $date->getTimestamp();
	$pre_token = ($date->getTimestamp());
	$token = password_hash($pre_token, PASSWORD_DEFAULT);
	//$hash = password_hash($password, PASSWORD_DEFAULT);

// The message
$message = "Olá," + $name + "\n Você solicitou um reset de senha na Rádio VN, acesse o link a seguir para prosseguir com o reset: \n https://radio.vitaminanerd.com.br/resetarCadastro.php?" + token;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send
mail('luanbiao@hotmail.com', 'Rádio VN - Alteração de Senha', $message);

		try {
		$inserir = $pdo->prepare('INSERT INTO register (token) VALUES (:token)');
	$inserir->execute(array(
	':token' => $token,
		));
		session_start();	
		echo "Token inserido com sucesso";
		}
	catch(PDOException $e){
		echo 'Não foi possível inserir o registro: ' . $e->getMessage();
		}
} else {
	echo 'Usuário e/ou e-mail não conferem.';
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
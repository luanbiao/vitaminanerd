<?php
//include "config.php";
$dbUsername = 'root';
$dbPassword = 'G4tosN3rds2505';
$pontos = '0';
$check = 0;
$name = $_POST['name'];
//$email=$_POST['email'];
$password=$_POST['password'];
//$number=$_POST['number'];
//$address=$_POST['address'];
	

// ============================ SELECT =============================================
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT name, pontos FROM register");
	
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			if ($linha['name'] == $name){
			$check = 1;
			}
		}
	} catch(PDOException $e){
	echo 'Não foi possível efetuar o select';
	}
	

// ============================ INSERT ==============================================
if ($check == 0){
	$hash = password_hash($password, PASSWORD_DEFAULT);
			$_SESSION['name'] = $name;
	try {
	//$inserir = $pdo->prepare('INSERT INTO register (name, email, password, number, address, pontos) VALUES (:name,:email,:password,:number,:address,:pontos)');
	$inserir = $pdo->prepare('INSERT INTO register (name, password, pontos) VALUES (:name,:hash,:pontos)');
	$inserir->execute(array(
	':name' => $name,
	//':email' => $email,
	':hash' => $hash,
	//':number' => $number,
	//':address' => $address,
	':pontos' => $pontos
	));
	
	//echo $inserir->rowCount();
session_start();
		$_SESSION['name'] = $name;

					echo "<script>alert('Cadastro efetuado com sucesso!');";
		echo "javascript:window.location='/radio/index.php';</script>";
		//header('Location: /radio/index.php');
	} catch(PDOException $e){
	echo 'Não foi possível inserir o registro: ' . $e->getMessage();
	}

} else {
		$_SESSION['duplicado'] = 1;
		echo "<script>alert('Já existe um usuário com esse nome. Tente novamente!');";
		echo "javascript:window.location='/radio/chat/register.php';</script>";
		//header('location:/radio/chat/register.php');
	//echo "O registro já existe no sistema";
}
	
	?>
	
	
	
	

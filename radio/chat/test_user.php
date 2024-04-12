<?php

//include "config.php";
$dbUsername = 'root';
$dbPassword = 'G4tosN3rds2505';
$name = 'teste2029';
$pontos = '99';
$check = 0;
// ============================ SELECT =============================================
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT name, pontos FROM register");
	
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo "Nome: {$linha['name']} - Pontos: {$linha['pontos']}<br />";
	
			if ($linha['name'] == $name){
			$check = 1;
			}
	
	}
	
	} catch(PDOException $e){
	echo 'Não foi possível efetuar o select';
	}
	

// ============================ INSERT ==============================================
if ($check == 0){
	try {
	$inserir = $pdo->prepare('INSERT INTO register (name, pontos) VALUES (:name,:pontos)');
	$inserir->execute(array(
	':name' => $name,
	':pontos' => $pontos
	));
	
	echo $inserir->rowCount();
	} catch(PDOException $e){
	echo 'Não foi possível inserir o registro: ' . $e->getMessage();
	}
} else {
	echo "O registro já existe no sistema";
}
	
	?>
	
	
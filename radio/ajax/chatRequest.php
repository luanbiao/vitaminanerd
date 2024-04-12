<?php
@session_start();


	$conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
	
$usuario=($_SESSION['name']);
$administradores = array("luanbiao", "veriluna", "felipenovax", "davidalmeida", "daniloaraujo", "willianmendes", "diegonoviscki", "elisassuncao", "fernandacavalcanti", "marcelodeldebbio", "paulomartins", "wislomalmeida");

foreach ($administradores as $value) {

    if ($value == $usuario){
	$admin = 1;
	}
	
}

if (!isset($admin)) {
    $admin = 0;
}

$mensagemChat = $_POST["mensagem"];

//echo "<script>console.log(" . $usuario . " - " . $admin . " - " . $mensagemChat .")</script>";
$sql="INSERT INTO chat (name, message, admin) VALUES ('$usuario', '$mensagemChat', '$admin')";
if($conn->query($sql)===TRUE){

    echo "Mensagem enviada.";
	} else {
	echo "Erro no envio da mensagem.";
	}

?>
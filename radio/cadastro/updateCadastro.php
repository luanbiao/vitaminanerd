<?php
$conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
$name=$_POST["name"];
$pontos=$_POST["pontos"];
$admin=$POST["admin"];

$sql="UPDATE register set name='$name', pontos='$pontos', admin='$admin' where name='$name'";
if($conn->query($sql)===TRUE){
    echo  "Usuário" . $name . " atualizado. Atualmente possui " . $pontos . " e status de admin " . $admin . "";
	} else {
	echo "Erro na atualizacao do usuario";
	}
?>
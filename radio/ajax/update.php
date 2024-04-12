<?php
	$conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
$name=$_POST["name"];
$ctgr=$_POST["ctgr"];
//$diferenca=$_POST["diferenca"];
//$_SESSION["pontos"] = $diferenca;
$_SESSION["pontos"] = $_SESSION["pontos"]+10;
$sql="UPDATE register set name='$name', pontos='$ctgr' where name='$name'";
if($conn->query($sql)===TRUE){

    echo $name . " ganhou +10 pontos e agora possui " . $ctgr . " pontos";
	} else {
	echo "Erro no update";
	}
?>
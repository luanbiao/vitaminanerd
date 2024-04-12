<?php include "./../header.php"; ?>
<style>

  .container {
   width: 50%;
padding: 40px;

  }
  label{
  padding: 2px;
  }
  input{
  margin-right: 10px;
  }
@media only screen and (max-width: 600px) {
	.container{
	width: 100%;
	}
}


  </style>
  
  <style>
@media only screen and (max-width: 600px) {

.movimento{
	display: none;
}
.tempo{
	display: none;
}
.radio-app{
	grid-template-columns: 1fr 1fr 1fr;
}
.menu-mobile span{
	padding: 5px;

	
}

.right-panel span{
	font-size: x-large;
	padding: 2px;
	
}

.radio-app .TocandoMusica{
	display: none;
}
.radio-app .TocandoArtista{
	display: none;
}

.right-panel-2 {
	font-size: small;
	
}

.radio-app2 {
	font-size: x-large;
	grid-template-columns: 1fr;
	

}
.nav>li {
	display: -webkit-inline-box;
	padding-bottom: 10px;
	padding-top: 10px;
}

	#menu-mob{
	display: grid;
	grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
	width: 100%;

	}
.nav>li a {
	display: contents;
	font-size: small;
}

#menu-mob a{
	font-size: small;

}
#menu-mob li{

	padding-top: 5px;

}
.usuario{
	float: left;
	padding-left: 10px;
}

#menu-mob span{
	font-size: xx-large;

}

 </style>
 
<?php
  include "config.php";
  		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if($_POST)
	{
$erro = 1;
$name = $_POST['name'];
$password = $_POST['password'];

 $stmt = $pdo->prepare("SELECT * FROM register WHERE name = ?");
$stmt->execute([$_POST['name']]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password']))
{
     session_start();
			$erro = 0;
			$_SESSION['name'] = $user['name'];
			$_SESSION['admin'] = $user['admin'];
	
			echo "<script>alert('Login efetuado com sucesso!');";
		echo "javascript:window.location='/radio/index.php?play=1';</script>";
} else {

    echo "<script>alert('Nick ou Senha errada');</script>";
}
/*
$sql = "SELECT * FROM register WHERE name = ?";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$_POST['name']]);
$users = $result->fetchAll();
echo $users[0];
if (isset($users[0])) {
    if (password_verify($_POST['password'], $users[0]->password)) {
      session_start();
			$erro = 0;
			$_SESSION['name'] = $linha['name'];
			$_SESSION['admin'] = $linha['admin'];
			header('Location: /radio/index.php');
    } else {
      echo "<script>alert('Senha errada');</script>";
    }
} else {
	echo "<script>alert('Login errado');</script>";
}


		/*try {
		$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT * FROM register WHERE name = '".$name."'");
	
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
	//echo "Nome: {$linha['name']} - Pontos: {$linha['pontos']}<br />";
	
			if ($linha['name'] == $name){
			if (password_verify($_POST['password'], $linha['password']->password)) {
			session_start();
			$erro = 0;
			$_SESSION['name'] = $linha['name'];
			$_SESSION['admin'] = $linha['admin'];
			header('Location: /radio/index.php');
			}
			} 
	}
	if ($erro = 1){
	echo "<script>alert('Nick ou Senha não conferem');</script>";
	}
	
	}
	
	 catch(PDOException $e){
	echo 'Não foi possível efetuar o select';
	}*/
	
	
	/*	$sql = "SELECT * FROM `register` where name = '".$name."' and password = '".$password."' ";
		$query =  mysqli_query($conn, $sql);
		if(mysqli_num_rows($query)>0)
		{
			$row = mysqli_fetch_assoc($query);
			session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['admin'] = $row['admin'];
				header('Location: /radio/index.php');
		}
		else
		{
			echo "<script> alert('Login ou Senha errados.'); </script>";
		}*/
		}
?>

<div class="container">

  <form class="form-horizontal" method="post" action="">
    <center><h2>Login</h2></center><hr/>

	<div class="d-flex justify-content-center">
	    <div class="form-group">
      <label class="control-label" for="name"><span class="glyphicon glyphicon-user"></span> Nick:</label>
        <input type="name" class="form-control" id="name" placeholder="Nome/Nick" name="name"></input>
</div>
         <div class="form-group">
      <label class="control-label" for="pwd"><span class="glyphicon glyphicon-asterisk"></span> Senha:</label>      
        <input type="password" class="form-control" id="pwd" placeholder="Digite sua Senha" name="password"></input>
      </div>
    <div class="form-group">        
        <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Acessar</button>

      </div>
    </div>

	 <i>Acessando você poderá usar o chat e o sistemas de ranking. Ganhe pontos a cada minuto!</i>
  </form>
 
</div>
</div>
</body>
</html>

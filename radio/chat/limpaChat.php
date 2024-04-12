<?php 
	session_start();
	if(isset($_SESSION['name']))
	{
		include "layouts/header2.php"; 
		include "config.php"; 
		$name = $_SESSION['name'];
			$sql = "TRUNCATE TABLE `chat`";

		$query = mysqli_query($conn,$sql);
	}
?>
<style>
	body{
	color: white;
	}
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>

<div class="container">
  <center><h2>Bem vindo <span style="color:#dd7ff3;"><?php echo $_SESSION['name']; ?> !</span></h2>
  <br><br>
	<label>Clique no botão abaixo para voltar a rádio</label><br>
	<br><br>
	<a href="./../index.php" class="btn btn-primary">Voltar para rádio</a>
		<br><br>
  <?php 

			echo "<p>Tabela de chat esvaziada com sucesso</p>";

		

		?>
</div>

</body>
</html>
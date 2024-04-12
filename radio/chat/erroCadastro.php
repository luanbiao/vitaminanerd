<style>
	.menu-admin{
		  text-align: center;
		  bottom: 0;
	}
		
	.menu-admin li{
	padding: 10px;
	}
	.container{
	min-height: 90% !important;
	}
	
	.menu-admin span{
		font-size: xx-large;
	}
	</style>
<?php 
	session_start();
	$_SESSION['duplicado'] = 0;

	if(isset($_SESSION['name']))
	{
	
		include "config.php"; 
		$name = $_SESSION['name'];
			$sql = "SELECT * FROM `register` where name = '".$name."'";

		$query = mysqli_query($conn,$sql);
?>
  <?php 
 if(mysqli_num_rows($query)>0)
		{
			$row = mysqli_fetch_assoc($query);
			$administrador = $row['admin'];

		 if ($administrador == 1){
		 		include "../header2.php"; 
		 
		 } else{
		 	include "../header.php"; 
		 }
		}
		?>



</div>

</body>
</html>
<?php
	}
	else
	{
	$_SESSION['duplicado'] = 1;
		header('location:/radio/chat/register.php');
	}
?>
<div class="menu-admin">
		<ul class="nav navbar-nav mx-auto">
<li><a href="/radio/ranking/alterarDados.php"><span class="glyphicon glyphicon-cog"></span> </a></li>
	<li><a href='javascript:limpa()'><span class='glyphicon glyphicon-comment'></span> </a></li>
<li><a href='/radio/chat/json/index.php'><span class='glyphicon glyphicon-upload'></span> </a></li>
	  </ul>
		</div>
		
<script>
	function limpa(){
var r = confirm("Desejar excluir todos os registros de chat?");
if (r == true) {
	
window.location.href = "limpaChat.php";

} else {

}
	}
</script>
<?php 
@session_start();
	if(isset($_SESSION['name']))
	{
		include "config.php"; 
		$sql="SELECT * FROM `chat` ORDER BY created_on DESC";
		$query = mysqli_query($conn,$sql);
	}
?>

<div class="modal-content">
    <p class="tituloModal">😵 Lista de Mensagens<span class="fechar fas fa-times-circle" id="spanListaMensagens"></span></p><br>
 <table class='table'>
<?php
	if(mysqli_num_rows($query)>0){
		while($row= mysqli_fetch_assoc($query)){
?>
		<tr>
				<td class="nome-chat"><?php echo $row['name']; ?></td>
				<td class="mensagem-chat"><?php echo $row['message']; ?></td>
			</tr>
<?php
		}
	}else{
?>
<div class="message">
			<p>	Nenhuma mensagem anterior	</p>
</div>
<?php
	}     	
?>
</table>
  </div>




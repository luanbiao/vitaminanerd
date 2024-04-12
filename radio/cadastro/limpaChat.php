	<?php 
	@session_start();
	if(!($_SESSION['admin']) == 1){
		header ('Location: /radio/chat/logout.php');
	}
	?>
	
<div class="modal-content">
    <p class="tituloModal">💬 Mensagens<span class="fechar fas fa-times-circle" id="spanLimpaChat"></span></p><hr/><br>
	<?php 
	
	include "config.php";
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT * FROM chat");
	echo "<table class='table'><thead>";
	echo "<tr>";
	echo "<td>🆔 id</td>";
	echo "<td>📅 Data</td>";
	echo "<td>🧟 Usuário</td>";
	echo "<td>✉️ Mensagem</td>";
	echo "</thead>";
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			echo "
			<tr>
			<td>" . $linha['id'] . "</td>
			<td>" . $linha['created_on'] . "</td>
			<td>" . $linha['name'] . "</td>
			<td>" . $linha['message'] . "</td>
			</tr>";
			}
	echo "</table>";
	} catch(PDOException $e){
	echo 'Não foi possível encontrar mensagens.';
	}
?>

  <br/>
	 <p class="tituloModal">❌ Excluir Mensagens Específicas</p><hr><br/>
 <input type="text" id="alterarChatID" name="alterarChatID" maxlength="20" placeholder="🆔 id"/>
<button type="submit"  id="btnAlterarChat" class="botaoModal" value="Alterar"/>❌ Excluir</button><br/><br/>
  
  <p class="tituloModal">🗑 Limpar Todas as Mensagens</p><hr><br/>
  <button type="submit"  id="btnLimpaChat" class="botaoModal" value="Limpar Chat"/>🗑 Limpar Mensagens</button>

<br>
  </div>


<script>
  $(document).ready(function(){
				   $("#btnLimpaChat").click(function(){				
                    $.ajax({
                        url:'ajax/limpaChatRequest.php',
                        method:'POST',
                        data:{
                        },
                        success:function(response){
                            alert(response);
							  modal_limpaChat.style.display = "none";
                        }
                    });
                });
				 $("#btnAlterarChat").click(function(){		
				        var id=$("#alterarChatID").val();
                    $.ajax({
                        url:'ajax/alteraChatRequest.php',
                        method:'POST',
                        data:{
						id,id
                        },
                        success:function(response){
                            alert(response);
							  modal_limpaChat.style.display = "none";
                        }
                    });
                });
  });
</script>
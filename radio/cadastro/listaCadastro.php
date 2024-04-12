	<?php 
	@session_start();
	if(!($_SESSION['admin']) == 1){
		header ('Location: /radio/chat/logout.php');
	}
	?>
<style>
	.column {
  float: left;
  padding: 10px;
  width: 33.33%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.modal input{
	margin-bottom: 10px;
}
	</style>

<div class="modal-content">
	<p class="tituloModal"><i class="fas fa-users-cog"></i> Lista de Usuários<span class="fechar fas fa-times-circle" id="spanListaCadastro"></span></p><hr><br>
	<?php
	
	include "config.php";


// LISTA OS USUÁRIOS DA RÁDIO
	try {
	$pdo = new PDO('mysql:host=localhost;dbname=radio', $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$consulta = $pdo->query("SELECT * FROM register");
	echo "<table class='table'><thead>";
	echo "<tr>";
	echo "<td>🆔 id</td>";
	echo "<td>📅 Data de Cadastro</td>";
	echo "<td>🧟 Usuário</td>";
	echo "<td>✉️ Email</td>";
	echo "<td>🏅 Pontos</td>";
	echo "<td>⛧ Admin</td>";
	echo "</thead>";
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			echo "
			<tr>
			<td>" . $linha['id'] . "</td>
			<td>" . $linha['modified_on'] . "</td>
			<td>" . $linha['name'] . "</td>
			<td>" . $linha['email'] . "</td>
			<td>" . $linha['pontos'] . "</td>
			<td>" . $linha['admin'] . "</td>
			</tr>";
			}
	echo "</table>";
	} catch(PDOException $e){
	echo 'Não foi possível encontrar pedidos.';
	}
	
	?>
	 <br/><br/>
	 <div class="row">
	 
  <div class="column">
	  	 <p class="tituloModal">❌ Excluir Usuários Especificos</p><hr><br/>
<input type="text" id="excluirUsuariosID" name="excluirUsuariosID" maxlength="20" placeholder="🆔 id"/>
<button type="submit"  id="btnExcluirUsuarios" class="botaoModal" value="Excluir"/>❌ Excluir</button>
	</div>
	
  <div class="column">
	   <p class="tituloModal">⚗️ Alterar Dados de Usuário</p><hr><br/>
 <input type="text" id="alterarNick" name="alterarNick" maxlength="20" placeholder="🧟 Nick"/><br>
 <input type="email" id="alterarEmail" name="alterarEmail" maxlength="200" placeholder="✉️ Email"/><br>
 <input type="text" id="alterarPontos" name="alterarPontos" maxlength="5" placeholder="🏅 Pontos"/><br>
 <input type="text" id="alterarAdmin" name="alterarAdmin" maxlength="1" placeholder="⛧ Admin (0 ou 1)"/><br>

  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit"  id="btnAlterarUsuario" class="botaoModal" value="Alterar"/>⚗️ Alterar</button>
	  </div>
	  
	  
  <div class="column">
  <p class="tituloModal">🗑 Zerar pontuação do Ranking</p><hr><br/>

 
  <button type="submit"  id="btnZerarRanking" class="botaoModal" value="Zerar Ranking"/>🗑 Zerar Ranking</button>
	  </div>
	  
</div>




	</div>

<script>

  $(document).ready(function(){
    $("#btnExcluirUsuarios").click(function(){	
				      var id=$("#excluirUsuariosID").val();
                    $.ajax({
                        url:'ajax/excluirUsuariosRequest.php',
                        method:'POST',
                        data:{
						id,id
                        },
                        success:function(response){
                            alert(response);
							  modal_listaPedidos.style.display = "none";
                        }
                    });
                });
				   $("#btnAlterarUsuario").click(function(){
				
                    var nome=$("#alterarNick").val();
                    var pontos=$("#alterarPontos").val();
					var email=$("#alterarEmail").val();
					var admin=$("#alterarAdmin").val();
					if (email.includes("@")){
                    $.ajax({
                        url:'ajax/updateCadastroRequest.php',
                        method:'POST',
                        data:{
                            nome:nome,
                            pontos:pontos,
							email:email,
							admin:admin
                        },
                        success:function(response){
                            alert(response);
							 modal_listaCadastro.style.display = "none";
						document.getElementById("alterarNick").innerHTML="";
						document.getElementById("alterarEmail").innerHTML="";
						document.getElementById("alterarPontos").innerHTML="";
						document.getElementById("alterarAdmin").innerHTML="";
                        }
                    });
					} else {
				   alert("Digite um email válido!");
				   }
                });
				   
				
				  $("#btnZerarRanking").click(function(){
				
                 
                    $.ajax({
                        url:'ajax/zerarRankingRequest.php',
                        method:'POST',
                        data:{

                        },
                        success:function(response){
                            alert(response);
							 modal_listaCadastro.style.display = "none";
		
                        }
                    });
                });
 });
</script>
<?php 
@session_start();
	if(isset($_SESSION['name']))
	{

		include "config.php"; 
		
	}
?>
<div class="modal-content">

    <p class="tituloModal">✉️ Envio de mensagem<span class="fechar fas fa-times-circle" id="spanMensagem"></span></p><br><hr/><br/>
 <input type="text" id="chatMensagem" name="msg" maxlength="255" height="300px" placeholder="Mensagem"/><br><br>

  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit" class="botaoModal" id="btnChatEnviar" value="Cadastrar"/>📨 Enviar mensagem</button>

<br>
  </div>




<script>
$('html').keydown(function(e){
  if(e.which==13){
    document.getElementById("btnChatEnviar").click();
  }
});
</script>

<script>

				   $("#btnChatEnviar").click(function(){
					var mensagem=$("#chatMensagem").val();
					document.getElementById("chatMensagem").value = "";
					if (mensagem.length < 3 || mensagem.length > 120){
				//	alert("Sua mensagem no chat é muito curta ou muito longa.");
					} else {
		
                    $.ajax({
                        url:'ajax/chatRequest.php',
                        method:'POST',
                        data:{
                            mensagem:mensagem
                        },
                        success:function(response){
                            alert("Mensagem enviada");
				  modal_mensagem.style.display = "none";
					}
                        
                    });
					}	
                });
				   

  
</script>


</body>
</html>
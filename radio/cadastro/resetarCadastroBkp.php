<?php
$nick=$_GET["nome"];
$token=$_GET["token"];
?>
<div class="modal-content">

    <p class="tituloModal"><i class="fas fa-pencil-alt"></i> Reset de Senha<span class="fechar fas fa-times-circle" id="spanCadastro"></span></p><br>
  <i class="fas fa-key">  Nova Senha: <input type="text" id="cadastroSenha" name="cadastroSenha" maxlength="20" placeholder="Senha"/><br><br>
  <i class="fas fa-key">  Nova Senha (repita): <input type="text" id="cadastroSenha2" name="cadastroSenha2" maxlength="255" placeholder="Senha (repita)"/><br><br>

  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit" class="botaoModal" id="btnResetar" value="Cadastrar"/><i class="fas fa-check-circle"></i> Cadastrar</button>

<br>
  </div>


<script>
  $(document).ready(function(){
				   $("#btnResetar").click(function(){
                    var nick= <?php echo $nick; ?>;
					var token= <?php echo $token; ?>;
					var senha=$("#cadastroSenha").val();
                    var senha2=$("#cadastroSenha2").val();
					
					if (senha <> senha2){
					alert("Senhas não são iguais");
					} else {

                    $.ajax({
                        url:'ajax/passwordRequest.php',
                        method:'POST',
                        data:{
                            nick:nick,
                            senha:senha,
							token:token,
							email:email
                        },
                        success:function(response){
                            alert(response);
								window.location.href = "/radio";

                        }
                    });*/
					alert(nick + token + senha);
					}
                });
				   
  });
  
</script>

<script>
	var input2 = document.getElementById("cadastroSenha");
	input2.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
  // Cancel the default action, if needed
  event.preventDefault();
  if (document.getElementById("cadastroModal").style.display == "block"){
    // Trigger the button element with a click
    document.getElementById("btnCadastrar").click();  }
  }

});
</script>
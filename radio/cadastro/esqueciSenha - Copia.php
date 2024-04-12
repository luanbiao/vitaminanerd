<div class="modal-content">

    <p class="tituloModal"><i class="fas fa-pencil-alt"></i> Esqueci a Senha<span class="fechar fas fa-times-circle" id="spanEsqueci"></span></p><br>
  <i class="fas fa-user"></i>  Nick: <input type="text" id="esqueciNick" name="cadastroNick" maxlength="20" placeholder="Nick"/><br><br>
  <i class="fas fa-envelope"></i>  Email: <input type="text" id="esqueciEmail" name="cadastroEmail" maxlength="255" placeholder="Email"/><br><br>

  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit" class="botaoModal" id="btnEsqueci" value="Cadastrar"/><i class="fas fa-check-circle"></i> Recuperar Senha</button>

<br>
  </div>


<script>
  $(document).ready(function(){
				   $("#btnEsqueci").click(function(){
                    var nick=$("#esqueciNick").val();
					var email=$("#esqueciEmail").val();
				
                    $.ajax({
                        url:'ajax/esqueciRequest.php',
                        method:'POST',
                        data:{
                            nick:nick,
							email:email
                        },
                        success:function(response){
                            alert(response);
							if (response != 'Usuário ou e-mail incorretos.')){
							window.location.href = "/radio/cadastro/resetarCadastro.php?nome=luanbiao";
							}
                        }
                    });
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
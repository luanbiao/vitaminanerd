<div class="modal-content">

    <p class="tituloModal">🖐️ Reset de Senha<span class="fechar fas fa-times-circle" id="spanResetarSenha"></span></p><br>
  <input type="password" id="resetSenha" name="resetSenha" maxlength="20" placeholder="🔑 Senha"/><br><br>
  <input type="password" id="resetSenha2" name="resetSenha2" maxlength="20" placeholder="🔑 Senha (repita)"/><br><br>

  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit" class="botaoModal" id="btnResetar" value="Resetar"/>🔓 Resetar</button>

<br>
  </div>


<script>

  $(document).ready(function(){
				   $("#btnResetar").click(function(){
				   var nick=sessionStorage.getItem("ux1")
					var senha=$("#resetSenha").val();
                    var senha2=$("#resetSenha2").val();
					if (senha.length < 6){
					alert("Digite uma senha com pelo menos 6 caracteres");
					} else {
					if (senha != senha2){
					alert("Senhas não são iguais");
					} else {

                    $.ajax({
                        url:'ajax/passwordRequest.php',
                        method:'POST',
                        data:{
                            nick:nick,
                            senha:senha
                        },
                        success:function(response){
                            alert(response);
								window.location.href = "/radio";

                        }
                    });
					//alert(nick + senha);
					}
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
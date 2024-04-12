<div class="modal-content">

    <p class="tituloModal">📝 Cadastro<span class="fechar fas fa-times-circle" id="spanCadastro"></span></p><br>
  <input type="text" id="cadastroNick" name="cadastroNick" maxlength="8" placeholder="🧟 Nick"/><br><br>
  <input type="email" id="cadastroEmail" name="cadastroEmail" maxlength="256" placeholder="✉️ Email"/><br><br>
  <input type="password" id="cadastroSenha" name="cadastroSenha" maxlength="20" placeholder="🔑 Senha"/><br><br>
  
  <!--<input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit" class="botaoModal" id="btnCadastrar" value="Cadastrar"/>🤗 Cadastrar</button>

<br>
  </div>


<script>
  $(document).ready(function(){
				   $("#btnCadastrar").click(function(){
				   
				   var regex = /^[A-Za-z0-9 @.]+$/;
					
                    var nick=$("#cadastroNick").val();
					var email=$("#cadastroEmail").val();
					var senha=$("#cadastroSenha").val();
	
					var validate_nick = regex.test(nick);
					var validate_email = regex.test(email);
					var validate_senha = regex.test(senha);
					
					//console.log(validate_nick);
					//console.log(validate_email);
					//console.log(validate_senha);
					
					
					var pass = 1;
					
				
					if (validate_nick == false){
					pass = 0;
					alert("Digite um nick válido");
					$("#cadastroNick").focus();
					}        
					
					if (validate_email == false){
					pass = 0;
					alert("Que tipo de e-mail é esse?");
					$("#cadastroEmail").focus();
					} 
					if (!email.includes("@")){
					pass = 0;
					alert("Digite um e-mail válido");
					$("#cadastroEmail").focus();
					}
					
					if (senha.length < 6){
					pass = 0;
					alert("Digite uma senha com pelo menos 6 digitos");
					$("#cadastroSenha").focus();
					}
				
					if (pass == 1) {
				                    $.ajax({
                        url:'ajax/cadastroRequest.php',
                        method:'POST',
                        data:{
                            nick:nick,
                            senha:senha,
							email:email
                        },
                        success:function(response){
                            alert(response);
								window.location.href = "/radio?play=1";
                        }
                    });
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
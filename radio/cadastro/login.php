<div class="modal-content">
	<form autocomplete="off">
    <p class="tituloModal">🔐 Login<span class="fechar fas fa-times-circle" id="spanLogin"></span></p><br>
   <input type="text" id="loginNick" name="loginNick" maxlength="20" placeholder="🧟 Nick" /><br><br>
   <input type="password" id="loginSenha" name="loginSenha" maxlength="20" placeholder="🔑 Senha" /><br><br>
</form>
  <!--</form><input type="button" id="adicionaBtn" onclick="pedirMusica(this.form.pedidosID.value, this.form.pedidosArtista.value, this.form.pedidosMensagem.value)" value="Adicionar a Rádio"/>-->
  <button type="submit"  id="btnLogar" class="botaoModal" value="Login"/>🔥 Login</button>


<br/>
<br/>
  <button type="submit"  id="btnEsqueciSenha" class="botaoModal" value="Esqueci Minha Senha"/>😵 Esqueci minha Senha</button>

  </div>


<script>
	var input = document.getElementById("loginSenha");
	input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
  // Cancel the default action, if needed
  event.preventDefault();
  if (document.getElementById("loginModal").style.display == "block"){
    // Trigger the button element with a click
    document.getElementById("btnLogar").click();  }
  }

});
  
  
  

  $(document).ready(function(){
				   $("#btnLogar").click(function(){
                    var nick=$("#loginNick").val();
                    var senha=$("#loginSenha").val();
				
                    $.ajax({
                        url:'ajax/loginRequest.php',
                        method:'POST',
                        data:{
                            nick:nick,
                            senha:senha
                        },
                        success:function(response){
                            alert(response);

							if (response.includes('sucesso')){
							sessionStorage.setItem('pontos',0);
					
							window.location.href = "/radio/index.php?play=1"; 
							}
                        }
                    });
                });
		
  });
</script>


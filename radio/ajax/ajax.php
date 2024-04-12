<html>
    <head>
        <title>Update Data</title>
        <script src="./js/jquery.min.js"></script>
    </head>
    <body>
      

			<?php 
		echo  'Musica: <input type="text" id="pedidosNome"><br/>';
		echo  'Artista: <input type="text" id="pedidosArtista"><br/>';
		echo  'Mensagem: <input type="text" id="pedidosMensagem"><br/>';
		?>
        <button type="submit" id="btnPedidos">ENVIAR PEDIDO</button>
		
			<br/>		<br/>
			<?php 
		echo  'Mensagem no Chat :<input type="text" id="chatMensagem"><br/>';
		?>
        <button type="submit" id="btnChat">ENVIAR CHAT</button>
        </center>
        <script>
            $(document).ready(function(){
           
				
				   $("#btnPedidos").click(function(){
                    var nome=$("#pedidosNome").val();
                    var artista=$("#pedidosArtista").val();
					var mensagem=$("#pedidosMensagem").val();
                    $.ajax({
                        url:'pedidosRequest.php',
                        method:'POST',
                        data:{
                            nome:nome,
                            artista:artista,
							mensagem:mensagem
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                });
				
				   $("#btnChat").click(function(){
					var chatMensagem=$("#chatMensagem").val();
                    $.ajax({
                        url:'chatRequest.php',
                        method:'POST',
                        data:{
                           chatMensagem:chatMensagem
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
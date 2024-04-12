<html>
    <head>
        <title>Update Data</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <center>
        <h3>UPDATE DATA</h3>
        <?php
		include "./../header.php";
        $conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
        $sql = "SELECT * FROM register";
        $result = $conn->query($sql);
		?>
		<table>
		<tr>
<!--<td>ID</td>-->
<td>Nome</td>
<td>Pontos</td>
</tr>

	<?php
        while ( $row=mysqli_fetch_assoc($result)) {  
		
	//	echo "<tr><td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['pontos']."</td></tr>";
        //  echo  'Nome :<input type="text" id="mod" value="'.$row['name'].'">';         
        // echo  'Pontos :<input type="text" id="ctgr" value="'.$row['pontos'].'"><br/>';
        }?> 
		</table>
		<?php
		echo  'Nome :<input type="text" id="mod">';     
		echo  'Pontos :<input type="text" id="ctgr"><br/>';
		?>
        <button type="submit" id="update">UPDATE</button>
		<br/>		<br/>
			<?php 
		echo  'Musica :<input type="text" id="pedidosNome"><br/>';
		echo  'Artista :<input type="text" id="pedidosArtista"><br/>';
		echo  'Mensagem :<input type="text" id="pedidosMensagem"><br/>';
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
                $("#update").click(function(){
                    var name=$("#mod").val();
                    var ctgr=$("#ctgr").val();
                    $.ajax({
                        url:'update.php',
                        method:'POST',
                        data:{
                            name:name,
                            ctgr:ctgr
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                });
				
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
<?php 
@session_start();
	if(isset($_SESSION['name']))
	{

		include "config.php"; 
		
		$sql="SELECT * FROM `chat` ORDER BY created_on DESC";

		$query = mysqli_query($conn,$sql);
	}
?>
<style>
	
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	 /* color:#008adc;*/
	  font-weight:bold;
  }

  .btn-primary {
    background-color: #e9a131;
	}

#style-1::-webkit-scrollbar {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #ffffff;
		border-radius: 10px;
;
} 
#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;

}

#style-1::-webkit-scrollbar-thumb {
	background-color: #428bca;
		border-radius: 10px;
}
	.display-chat{
		height:300px;
		background-color:#001d2e;
		margin-bottom:4%;
		overflow:auto;
		padding:5px;
	}
	.message{
		background-color: #00253a;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
		
	}
	
	.mensagens{
	width: 80%;
	text-align: center;
	margin: auto;
	padding: 5px;
	}
	
	.enviar button{
	width: 80%;
	}
	.esquerda-admin{
		text-align: left;
	}
	
	.nome-chat {
	color: #e9a131;
	}
	
	.mensagem-chat{
	color: white;
	}
	.direita-user {
		text-align: right;
	}
	
	.direita-user .nome-chat {
	color: #008adc;
	}
	
  </style>

<body>
<div class="display-chat" id="style-1">

 

  <div >
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
		
		<?php
			if ($row['admin'] == 1){
				echo '<p class="esquerda-admin">';
			} else {
			echo  '<p class="direita-user">';
			}
				?>
		
		
				<span class="nome-chat"><?php echo $row['name']; ?>:</span>
				<span class="mensagem-chat"><?php echo $row['message']; ?></span>
			</p>
			
	
			
			
		</div>
<?php
		}
	}
	else
	{
?>
<div class="message">
			<p>
				Nenhuma mensagem anterior
			</p>
</div>
<?php
	} 
?>

  </div>
  </div>
  
  <!--<form class="form-horizontal" id="msgEnviar" method="post" action="/radio/chat/sendMessage.php">-->
    <div class="form-group" >
      <div class="mensagens" >          
<form autocomplete="off">
        <input type="text" autocomplete="off" name="msg" maxlength="140" class="form-control" placeholder="Digite sua mensagem..." id="chatMensagem" ></input>
</form>
      </div>
	   
      <div class="enviar">
        <button type="submit" class="btn btn-primary" id="btnChatEnviar">Enviar</button>
      </div>

    </div>
   <!-- </form>-->



<script>
$('html').keydown(function(e){
  if(e.which==13){
    document.getElementById("btnChatEnviar").click();
  }
});
</script>

 <script>
         /*   $(document).ready(function(){
				//setInterval(function() {
			$(".chat").load("/radio/chat/chatpage.php");
                
}, 1000 * 60 * 0.5);	
            });*/
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
                            //alert(response);
							mensagem = "";
								$(".chat").load("/radio/chat/chatpage.php");
                        }
                    });
					}	
                });
				   

  
</script>


</body>
</html>
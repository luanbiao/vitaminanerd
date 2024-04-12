<?php 
/*@session_start();
	if(isset($_SESSION['name']))
	{

		include "config.php"; 
		
		$sql="SELECT * FROM `chat` ORDER BY created_on DESC";

		$query = mysqli_query($conn,$sql);
	}*/
?>
<style>
	p.regulamento{
	font-size: 16px;
	}
	td{
	vertical-align: middle !important;
	font-size: 16px;
	}
	
	
.sorteado{
	padding-top: 10%;
	padding-bottom: 10%;
}

  </style>

<body>
<div>
<div class="sorteado">

	<!--<tr>
	<td><img id="premioImg" src="img/premio.png" width="100px"></img></td>
   <td>Prêmio da última promoção</td>
   </tr> -->
	<p style="font-style:italic; font-size: 20px">Parabéns ⭐red</p><br/>

<button id="btnPremio" class="botaoMenu"></li><img id="premioImg" src="img/premio-2.png" width="200px"></img></button><br/><br/>


	<p style="font-style:italic; font-size: 20px">Levou um Cell na última promoção</p><br/>

  </div>

  </div>

</body>
</html>
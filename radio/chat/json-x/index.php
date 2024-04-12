<?php


	@session_start();
	if ($_SESSION['admin'] == 1){
	include "./../../header2.php";
	
	
	if(isset($_SESSION['name']))
		
	{
	$nome = ($_SESSION['name']);

		$sessao = 1;
	}
	else
	{
		$sessao = 0;
	}
	} else {
	header('Location: /radio/'); 
	}
	?>
	
<script>var pathname = window.location.pathname; console.log(pathname);</script>



<div class="container">
	<card>
  <center><h2>Bem vindo <span style="color:#008adc;"><?php echo $_SESSION['name']; ?> !</span></h2><hr/>
  <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
        Selecione um JSON para enviar:<br/><br/>
        <input type="file" name="the_file" class="btn btn-primary" id="fileToUpload"><br/>
        <input type="submit" name="submit" class="btn btn-primary" value="Enviar Arquivo">
		<hr/>
    </form>
	
	<?php
	
  if ($handle = opendir('./uploads/')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        @$thelist .= '<li><a href="./uploads/'.$file.'">'.$file.'</a></li>';
      }
    }
    closedir($handle);
  }
?>
<h1>Lista de arquivos:</h1>
<ul><?php echo $thelist; ?></ul>
</div>

</body>
</html>

	<?php 
	@session_start();
	if(!($_SESSION['admin']) == 1){
		header ('Location: /radio/chat/logout.php');
	}
	?>
<div class="modal-content">
	<p class="tituloModal"><i class="fas fa-list-ol"></i> Lista JSON<span class="fechar fas fa-times-circle" id="spanListaJson"></span></p><hr><br>


     <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
        Selecione um JSON para enviar:<br/><br/>
		<input type="file" name="the_file" class="botaoModal" id="fileToUpload"><br/>
        <input type="submit" name="submit" class="botaoModal" value="✔ Enviar Arquivo">

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

   if ($handle = opendir('./ranking/logs/')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
       @$thelogs .= '<li><a href="./ranking/logs/'.$file.'">'.$file.'</a></li>';
      }
    }
    closedir($handle);
  }
?>
	<br/><p class="tituloModal"><i class="fas fa-download"></i> Baixar JSON</p><hr/><br/>
<ul><?php echo $thelist; ?></ul>
	<br/><p class="tituloModal"><i class="fas fa-download"></i> Baixar Logs</p><hr/><br/>
<ul><?php echo $thelogs; ?></ul>
</div>






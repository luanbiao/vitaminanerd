<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Envio de base da Rádio VN em JSON</title>
</head>
<body>
    <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
        Selecione um JSON para enviar:
        <input type="file" name="the_file" id="fileToUpload">
        <input type="submit" name="submit" value="Start Upload">
    </form>
	
	<?php
	
  if ($handle = opendir('./uploads/')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        @$thelist .= '<li><a href="'.$file.'">'.$file.'</a></li>';
      }
    }
    closedir($handle);
  }
?>
<h1>Lista de arquivos:</h1>
<ul><?php echo $thelist; ?></ul>
</body>
</html>
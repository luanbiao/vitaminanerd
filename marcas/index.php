<?php
$pasta = "uploads/";

if(is_dir($pasta))
{
$diretorio = dir($pasta);

while($arquivo = $diretorio->read())
{
if(($arquivo != '.') && ($arquivo != '..'))
{
unlink($pasta.$arquivo);
echo 'Arquivo '.$arquivo.' foi apagado com sucesso. <br />';
}
}

$diretorio->close();
}
else
{
echo 'A pasta não existe.';
}
?>

<html lang="en" class="no-js">
	<head>
	<link rel="icon" type="image/png" href="favicon.png" />
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Ferramenta de Inserção de Watermark do Vitamina Nerd</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	<br/><br/><br/><br/><br/><br/><br/>
		<div class="container">
			
			<div class="content">
				<header class="codrops-header">
					<h1>Ferramenta de Inserção de Watermark v.3.6 <br /><span>do Vitamina Nerd</span></h1>
				</header>
				<form action="upload.php" method="post" enctype="multipart/form-data">

     <input type=image src="Logo PinT.png"> 
	 <br/><br/>Selecione a imagem para enviar e clique na capsula:<br/><br/>
	 <input type="file" name="fileToUpload" id="fileToUpload">
   
</form>
		</div> <!-- /container -->
		<script src="js/jquery-2.1.1.min.js"></script>

	</body>
</html>
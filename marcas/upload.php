
<?php $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
	 header('location: /imageresize');
    exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    echo "Lamento, somente arquivos de imagens são permitidos.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$imagem_final = "uploads/" . basename( $_FILES['fileToUpload']['name']);
	// echo '<img src="'. $imagem .'"/>';
    //    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br/>";
	//	echo '<img src="uploads/'. basename( $_FILES['fileToUpload']['name']).'"/>';
    } else {
       echo "Desculpe, ocorreu um erro no envio do seu arquivo.";
	  

    }
}

?>
<html lang="en" class="no-js">
<link rel="icon" type="image/png" href="favicon.png" />
	<head>
	
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 25px;
 
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

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

	<div class="sidenav">

 	<center><img src="Logo PinT.png" width="50%"></img><br/><br/><b>Ferramenta de Inserção de Watermark v.3.6 <span>do Vitamina Nerd</span></b></center><br/>

  <a class="btn-crop js-crop" href="#">Animes</a>
  <a class="btn-crop2 js-crop2" href="#">Filmes</a>
  <a class="btn-crop3 js-crop3" href="#">Games</a>
  <a class="btn-crop4 js-crop4" href="#">Livros</a>
      <a class="btn-crop js-crop" href="#">Mangás</a>
  <a class="btn-crop5 js-crop5" href="#">Moda</a>
   <a class="btn-crop6 js-crop6" href="#">Quadrinhos</a>
  <a class="btn-crop7 js-crop7" href="#">Séries</a>
  <a class="btn-crop8 js-crop8" href="#">Tecnologia</a>
    <a class="btn-crop9 js-crop9" href="#">Podcast</a>
	  <a class="btn-crop9 js-crop9" href="#">Eventos</a>
	    <a class="btn-crop9 js-crop9" href="#">Promoções</a> 
		<a class="btn-crop9 js-crop9" href="#">Curiosidades</a>
		<a class="btn-crop10 js-crop10" href="#">BGS</a>
		<br/><br/><br/>
		<a href="./">Novo</a>
		
</div>


		<div class="container">
			
			<div class="content">
			
				<div class="component">
					<div class="overlay">
						<div class="overlay-inner">
						</div>
					</div>

					<img class="resize-image" src="<?php echo htmlspecialchars($imagem_final); ?>" alt="image for resizing">
					
				</div>
		<br/>
				        <canvas width="776" height="403" id="canvas"></canvas>
<br/>
				</div><!-- /content -->
					</div> <!-- /container -->

		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/component.js"></script>
	</body>
</html>
<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "./uploads/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['json']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
   @$fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "Este tipo de arquivo não é aceito, por favor envio um arquivo JSON.";
      }

      if ($fileSize > 4000000) {
        $errors[] = "O arquivo excede o tamanho máximo de (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "O arquivo " . basename($fileName) . " foi enviado com sucesso";
        } else {
          echo "Um erro ocorreu, por favor informe o administrador.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "Esses são os erros" . "\n";
        }
      }

    }
?>
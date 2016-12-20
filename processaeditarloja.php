<?php

  include("common/conexao.php");

  if (isset($_POST['nomeloja']) && isset($_POST['descricaoloja'])) {
    $idloja2 = $_GET["idedicao"];
    $nomeloja = utf8_decode($_POST['nomeloja']);
    $descricaoloja = utf8_decode($_POST['descricaoloja']);
    $shopping_box = $_POST["shopping_box"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $name = $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (isset($_POST['caminhoimagem'])){
      $caminhoimagem = $_POST['caminhoimagem'];
    } else {
      $caminhoimagem = "DEFAULT";
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $query3 = "UPDATE loja SET nome_loja='$nomeloja', descricao='$descricaoloja', caminhoimagem='$target_file' WHERE idloja=$idloja2";
    $result3 = mysqli_query($mysqli, $query3);
    header("location:index.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">

  <?php
    include("common/conexao.php");
  ?>

</head>
<body>

  <?php include ("common/header.php"); ?>
  <?php include ("common/navbar.php"); ?>

  <?php
  if(isset($_GET["idedicao"])) {
    $idedicao = $_GET["idedicao"];
    $query = "SELECT * FROM loja WHERE idloja = $idedicao";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    $nome_loja = $row['nome_loja'];
    $descricao = $row['descricao'];
    $box = $row['idbox'];
    $caminhoimagem = $row['caminhoimagem'];
    }
  ?>

  <div class="content">
    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">
          <label for="nomeloja">Nome da Loja</label>
          <input type="text" id="nomeloja" name="nomeloja" value="<?php echo utf8_encode($nome_loja) ?>" placeholder="" required>

          <br/>
          <br/>

          <label for="descricaoloja">Descrição da Loja</label>
          <input type="text" id="descricaoloja" class="grande" name="descricaoloja" value="<?php echo utf8_encode($descricao) ?>" placeholder="" required>


          <br>
          <br>
          <br>

          <p><h5>BOX ATUAL</h5></p>
          <?php echo "<a id='single_1' title='Box: $nomeb' href='$caminhoimagem'><img class='fotoloja' src='$caminhoimagem' alt=''/></a><br/>"; ?>

          <label for="fileToUpload"><h5>CADASTRAR NOVA IMAGEM DA BOX</h5></label>
          <input type="file" name="fileToUpload" id="fileToUpload">

          <br>
          <br>

          <input type="submit" value="Salvar Alterações">
        </div>
      </fieldset>
    </form>
  </div>

  <footer>
    <p id="footer_content">Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

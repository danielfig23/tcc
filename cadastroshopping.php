<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if  (isset($_POST['nomeshopping']) && isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['localizacaoshopping']) && isset($_POST['descricaoshopping'])) {

    $nomeshopping = utf8_decode($_POST['nomeshopping']);
    $cidade = $_POST['cidade'];
    $localizacaoshopping = $_POST['localizacaoshopping'];
    $descricaoshopping = utf8_decode($_POST['descricaoshopping']);
    $imagem = $_FILES["imagem"];

    #segundo http://www.w3schools.com/php/php_file_upload.asp

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $name = $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

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

    $query = "INSERT INTO `estabelecimento` (idestabelecimento, nome_estabelecimento, idcidade, horarioabeds, horariofecds, horarioabedom, horariofecdom, endereco, mapa, descricao, caminhoimagem) VALUES (NULL, '$nomeshopping', '$cidade', DEFAULT, DEFAULT, DEFAULT, DEFAULT, '$localizacaoshopping', NULL, '$descricaoshopping', '$target_file')";
    $result = mysqli_query($mysqli, $query);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

  <?php include ("common/header.php"); ?>
  <?php include ("common/navbar.php"); ?>

  <div class="cadastro">

    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">
          <label for="nomeshopping">Nome do Shopping</label>
          <input type="text" id="nomeshopping" name="nomeshopping" value="" placeholder="Entre com o Nome do Shopping" required>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM estado";
            $result_estado = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione o Estado</label>
          <select name="estado">
            <?php while($prod = mysqli_fetch_assoc($result_estado)) { ?>
              <option value="<?php echo $prod['uf'] ?>"><?php echo utf8_encode($prod['nome']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM cidade";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione a Cidade</label>
          <select name="cidade">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idcidade'] ?>"><?php echo utf8_encode($prod['nome_cidade']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <label for="localizacaoshopping">Localização do Shopping</label>
          <input type="text" id="localizacaoshopping" name="localizacaoshopping" value="" placeholder="Entre com a Localização do shopping (endereço)" required>

          <br>
          <br>

          <label for="descricaoshopping">Descrição do Shopping</label>
          <input type="text" id="descricaoshopping" class="grande" name="descricaoshopping" value="" placeholder="Entre com a Descrição do Shopping" required>


          <br>
          <br>

          <label for="fileToUpload">Imagem</label>
          <input type="file" name="fileToUpload" id="fileToUpload">

          <br>
          <br>

          <input type="submit" value="Cadastrar">
        </div>
      </fieldset>
    </form>
  </div>

  <footer>
    <p id="footer_content">Este site foi feito por Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

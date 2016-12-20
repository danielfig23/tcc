<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if (isset($_POST['nomeloja']) && isset($_POST['descricaoloja']) && isset($_POST['estabelecimento']) && isset($_POST['shopping_box']) && isset($_POST["checkboxvar"])) {

    $nomeloja = utf8_decode($_POST['nomeloja']);
    $descricaoloja = utf8_decode($_POST['descricaoloja']);
    $estabelecimento = utf8_decode($_POST['estabelecimento']);
    $imagemmarca = $_FILES["imagemmarca"];
    $imagemfachada = $_FILES["imagemfachada"];
    $categorias = $_POST["checkboxvar"];
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

    $queryprocura = "SELECT idbox FROM `loja`";
    $resultprocura = mysqli_query($mysqli, $queryprocura);

    foreach ($resultprocura as $id) {
      if ($shopping_box === $id["idbox"]){
        ?>
        <script>
          alert('Essa box já está ocupada! Por favor confira suas informações!');
        </script>

        <?php
        die ();
        header("location:cadastroloja.php");
      }
    }

    $query = "INSERT INTO `loja` (idloja, localizacao_loja, nome_loja, idestabelecimento, descricao, logoloja, fotofachada, idbox, caminhoimagem) VALUES (NULL, DEFAULT, '$nomeloja', '$estabelecimento', '$descricaoloja', '$mysqlImgMarca', '$mysqlImgFachada', '$shopping_box', '$target_file')";
    $result = mysqli_query($mysqli, $query);

    $querymax = "SELECT MAX(idloja) AS idloja FROM `loja`";
    $resultmax = mysqli_query($mysqli, $querymax);
    $idlojamax = mysqli_fetch_assoc($resultmax);
    $idlojamaxfinal = $idlojamax ["idloja"];

    foreach ($categorias as $categoria => $value) {
      $querycategs = "INSERT INTO `lojascategorias` (idcategorias, idloja) VALUES ('$value', '$idlojamaxfinal')";
      $resultcategs = mysqli_query($mysqli, $querycategs);
    }
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

          <label for="nomeloja">Nome da Loja</label>
          <input type="text" id="nomeloja" name="nomeloja" value="" placeholder="Entre com o Nome da Loja" required>

          <br>
          <br>

          <label for="descricaoloja">Descrição da Loja</label>
          <input type="text" id="descricaoloja" class="grande" name="descricaoloja" value="" placeholder="Entre com a localização da Loja" required>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM estabelecimento";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione um Estabelecimento</label>
          <span>(Não encontrou o estabelecimento desejado? <a href="cadastroshopping.php">Cadastre!)</a></span>
          <select name="estabelecimento">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idestabelecimento'] ?>"><?php echo utf8_encode($prod['nome_estabelecimento']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM shopping_box";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione uma Box</label>
          <span>(Não encontrou a box desejada? <a href="cadastrobox.php">Cadastre!)</a></span>
          <select name="shopping_box">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idbox'] ?>"><?php echo utf8_encode($prod['nome_box'])?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <label for="">Categorias da Loja</label>
          <span>(Não encontrou a categoria desejada? <a href="cadastrocategoria.php">Cadastre!)</a></span>
          <br />
          <?php
            $sqlcategorias = "SELECT * FROM categorias;";
            $resultcategorias = mysqli_query($mysqli, $sqlcategorias);
            $row_cnt = $resultcategorias->num_rows;
            if ($row_cnt == 0) {
              echo "<br/><br/><p>Não há categorias cadastradas neste sistema.</p>";
            }

            while ($linhacategorias = mysqli_fetch_array($resultcategorias)) {
              $idcateg = $linhacategorias["idcategorias"];
              $desccateg = $linhacategorias["descricao"];
              echo "<br><input type='checkbox' name='checkboxvar[]' value='$idcateg'/>".utf8_encode($desccateg)." - <a href='processaeditarcategoria.php?idedicao=$idcateg'>Editar</a> - <a href='processaexcluircategoria.php?idexclusao=$idcateg'>Excluir</a>";
            }
          ?>

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

  <footer id="footer_content">
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer>
</body>
</html>

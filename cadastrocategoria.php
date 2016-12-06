<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if (isset($_POST['categoria'])) {

    $categoria = $_POST['categoria'];
    $query = "INSERT INTO `categorias` (idcategorias, descricao) VALUES (NULL, '$categoria')";
    $result = mysqli_query($mysqli, $query);

    if($result){
      echo "Sucesso!";
    } else {
      echo "Falha!";
    }
  } else {
    echo "Você esqueceu alguma coisa!";
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

          <label for="categoria">Categoria</label>
          <input type="text" id="categoria" name="categoria" value="" placeholder="Nova Categoria" required>

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

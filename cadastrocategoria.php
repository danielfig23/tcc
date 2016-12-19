<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if (isset($_POST['categoria']) && isset($_POST['descricaocategoria'])) {

    $categoria = utf8_decode($_POST['categoria']);
    $descricaocategoria = utf8_decode ($_POST['descricaocategoria']);
    $query = "INSERT INTO `categorias` (idcategorias, descricao, descricao_categoria) VALUES (NULL, '$categoria', '$descricaocategoria')";
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

          <label for="categoria">Categoria</label>
          <input type="text" id="categoria" name="categoria" value="" placeholder="Nova Categoria" required>

          <br/>
          <br/>

          <label for="descricaocategoria">Descrição da Categoria</label>
          <input type="text" id="descricaocategoria" name="descricaocategoria" value="" placeholder="Descrição da Categoria" required>

          <br/>

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

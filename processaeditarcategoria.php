<?php

  include("common/conexao.php");

  if (isset($_POST['categoria']) && isset($_POST['descricaocategoria'])) {
    $idcategoria = $_GET["idedicao"];
    $categoria = $_POST['categoria'];
    $descricaocategoria = $_POST['descricaocategoria'];
    $query1 = "UPDATE categorias SET descricao='$categoria', descricao_categoria='$descricaocategoria' WHERE idcategorias=$idcategoria";

    if ($mysqli->query($query1) === TRUE) {
        header("location:cadastroloja.php");
    } else {
        ?>
        <script>
          alert('<?php echo "Error updating record: " . $conn->error; ?>');
        </script>
        <?php
    }
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
    $query = "SELECT * FROM categorias WHERE idcategorias = $idedicao";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    $nome = $row['descricao'];
    $descricao = $row['descricao_categoria'];
  }
  ?>

  <div class="content">
    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">

          <label for="categoria">Categoria</label>
          <input type="text" id="categoria" name="categoria" value="<?php echo utf8_encode($nome) ?>" placeholder="Nova Categoria" required>

          <br/>
          <br/>

          <label for="descricaocategoria">Descrição da Categoria</label>
          <input type="text" id="descricaocategoria" name="descricaocategoria" value="<?php echo utf8_encode($descricao) ?>" placeholder="Descrição da Categoria" required>

          <br/>
          <br/>

          <input type="submit" value="Cadastrar">
        </div>
      </fieldset>
    </form>
  </div>

  <footer>
    <p id="footer_content">Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

<?php

  include("common/conexao.php");

  if (isset($_POST['nomeshopping']) && isset($_POST['descricaoshopping'])) {
    $idestabelecimento2 = $_GET["idedicao"];
    $nomeshopping2 = $_POST['nomeshopping'];
    $descricaoshopping2 = $_POST['descricaoshopping'];
    $query1 = "UPDATE estabelecimento SET nome_estabelecimento='$nomeshopping2', descricao='$descricaoshopping2' WHERE idestabelecimento=$idestabelecimento2";

    if ($mysqli->query($query1) === TRUE) {
        header("location:index.php");
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
    $query = "SELECT * FROM estabelecimento WHERE idestabelecimento = $idedicao";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    $nome_shopping = $row['nome_estabelecimento'];
    $descricao = $row['descricao'];
  }
  ?>

  <div class="content">
    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">
          <label for="nomeshopping">Nome do Shopping</label>
          <input type="text" id="nomeshopping" name="nomeshopping" value="<?php echo utf8_encode($nome_shopping) ?>" placeholder="" required>

          <br>
          <br>

          <label for="descricaoshopping">Descrição do Shopping</label>
          <input type="text" id="descricaoshopping" class="grande" name="descricaoshopping" value="<?php echo utf8_encode($descricao) ?>" placeholder="" required>

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

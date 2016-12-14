<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');

  if (isset($_POST['tamanhobox']) && isset($_POST['estabelecimento']) && isset($_POST['nomebox'])) {

    $tamanhobox = $_POST['tamanhobox'];
    $estabelecimento = $_POST['estabelecimento'];
    $nomebox = utf8_decode($_POST['nomebox']);

    $query = "INSERT INTO `shopping_box` (idbox, tamanho, idestabelecimento, nome_box) VALUES (NULL, '$tamanhobox', '$estabelecimento', '$nomebox')";
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

          <label for="tamanhobox">Tamanho da Box (em metros)</label>
          <input type="text" id="tamanhobox" name="tamanhobox" value="" placeholder="Tamanho da Box" required>

          <?php
            // include("conexao.php");
            $query = "SELECT * FROM estabelecimento";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione um Estabelecimento</label>
          <select name="estabelecimento">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idestabelecimento'] ?>"><?php echo utf8_encode($prod['nome_estabelecimento']) ?></option>
            <?php } ?>
          </select>

          <label for="nomebox">Nome da Box</label>
          <input type="text" id="nomebox" name="nomebox" value="" placeholder="Nome da Box" required>

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

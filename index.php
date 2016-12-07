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

  <div class="content">

    <?php
      $query = "SELECT * FROM estabelecimento";
      $result = mysqli_query($mysqli, $query);
      foreach ($result as $estabelecimento) {

        if ($estabelecimento['caminhoimagem'] == NULL){
          $caminhoimagem = "images/index.png";
        } else {
          $caminhoimagem = $estabelecimento['caminhoimagem'];
        }

        echo '<a href="shopping.php?idshopping='.$estabelecimento["idestabelecimento"].'"><h3>'.utf8_encode($estabelecimento["nome_estabelecimento"]).'</h3></a>';
        echo "<img src='$caminhoimagem'></img>";
        echo '<p>'.$estabelecimento['descricao'].'</p>';
        echo "<br/>";
      }
    ?>
  </div>

  <footer>
    <p id="footer_content">Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

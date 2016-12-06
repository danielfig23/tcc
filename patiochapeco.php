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

  <div class="content">
    <h2 class="shopping">Patio Chapecó</h2>

    <?php
      include("common/conexao.php");
      if(isset($_GET["id"])) {
        echo "<h3>Lojas</h3>";
        $id = $_GET["id"];
        $query = "SELECT * FROM lojascategorias, loja, categorias WHERE loja.idloja = lojascategorias.idloja AND lojascategorias.idcategorias = categorias.idcategorias AND categorias.idcategorias = ".$id."";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $loja) {
          echo '<a href="patiochapeco.php?idloja='.$loja["idloja"].'">'.utf8_encode($loja["nome_loja"]).'</a><br/>';
        }
      } elseif (isset($_GET["idloja"])) {
        $id = $_GET["idloja"];
        $query = "SELECT * from loja WHERE idloja = $id";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $n_loja) {
          echo '<h3>'.utf8_encode($n_loja["nome_loja"]).'</3>';
        }
      } else {
        echo "<h3>Categorias</h3>";
        $query = "SELECT * FROM categorias";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $categ) {
          echo '<a href="patiochapeco.php?id='.$categ["idcategorias"].'">'.utf8_encode($categ["descricao"]).'</a><br/>';
        }
      }
    ?>
  </div>

  <footer id="footer_content">
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer>
</body>
</html>

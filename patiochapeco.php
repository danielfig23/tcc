<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Isto é um header.</h1>
  </header>

  <nav>
    <ul>
      <li><a href="index.php">Início</a></li>
      <li><a href="contato.php">Contato</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Shoppings</a>
        <div class="dropdown-content">
          <a href="garten.php">Garten Shopping</a>
          <a href="patiochapeco.php">Shopping Chapecó</a>
          <a href="continente.php">Continente Shopping</a>
        </div>
      </li>
      <li style="float:right"><a href="login.php">Login</a></li>
      <li style="float:right"><a href="cadastro.php">Register</a></li>
    </ul>
  </nav>

  <div class="content">
    <h2 class="shopping">Shopping Chapecó</h2>

    <?php
      include("conexao.php");
      if(isset($_GET["id"])) {
        echo "<h3>Lojas</h3>";
        $id = $_GET["id"];
        $query = "SELECT * from lojascategorias, loja, categorias WHERE loja.idloja = lojascategorias.idloja AND lojascategorias.idcategorias = categorias.idcategorias AND categorias.idcategorias = 1";
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

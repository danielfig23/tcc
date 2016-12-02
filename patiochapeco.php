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
    <h3>Categorias</h3>

    <?php

      if(isset($_GET["id_categorias"])) {
          $id = $_GET["id_categorias"];
          $query = "SELECT * FROM categorias";
      }
      else {
        include("conexao.php");
        $query = "SELECT * FROM categorias";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $categ) {
          echo '<a href="patiochapeco.php?id='.$categ["id_categorias"].'>'.$categ["descricao"].'</a><br/>';
        }
      }
    ?>
  </div>

  <footer id="footer_content">
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer>
</body>
</html>

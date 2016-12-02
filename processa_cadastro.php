<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">

  <?php
    include("conexao.php")
  ?>

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
          <a href="#">Garten Shopping</a>
          <a href="#">Shopping Chapecó</a>
          <a href="#">Continente Shopping</a>
        </div>
      </li>
      <li style="float:right"><a href="#about">Login</a></li>
      <li style="float:right"><a href="cadastro.php">Register</a></li>
    </ul>
  </nav>

  <div class="content">
  </div>

  <footer>
    <p id="footer_content">Este site foi feito por Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

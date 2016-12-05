<?php
  include("conexao.php");

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

  <?php
    include("conexao.php")
  ?>

</head>
<body>

  <header>
     <!---<img src="smiley.gif" alt="Smiley face" height="42" width="42">--->
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

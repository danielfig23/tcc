<?php
  include("conexao.php");

  if (isset($_POST['email']) && isset($_POST['password'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $emailquery = "SELECT * FROM adm WHERE email_adm = '$username'";
    $result = mysqli_query($mysqli, $emailquery);
    $row_cnt = $result->num_rows;
    if ($row_cnt > 0){
      $query = "SELECT senha_adm FROM adm WHERE email_adm = '$username'";
      $result = mysqli_query($mysqli, $query);
      $getHash = mysqli_fetch_assoc($result);
      $gotHash = $getHash['senha_adm'];
      if ($result){
        if (password_verify($password, $gotHash)){
          header("location:painel.php");
        } else {
          echo "<script>alert('Usuário ou senha incorretos!');</script>";
        }
      } else {
        echo "<script>alert('ERRO INTERNO! Por favor tente novamente!');</script>";
      }
    } else {
      echo "<script>alert('Email não encontrado!');</script>";
    }
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

  <div class="cadastro">
    <form method="POST">
      <fieldset>
        <div class="cadastro_content">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" value="" placeholder="Enter your Email" required><br><br>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="" placeholder="Enter your Password" required><br>

          <input type="submit" value="Submit">
        </div>
      </fieldset>
    </form>
  </div>
  <footer>
    <p id="footer_content">Este site foi feito por Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

<?php

  include("common/conexao.php");
  session_start();
  session_destroy();

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
          session_start();
          $_SESSION["user"] = $username;
          header("location:index.php");
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

  <?php include ("common/header.php"); ?>
  <?php include ("common/navbar.php"); ?>

  <div class="cadastro">
    <form method="POST">
      <fieldset>
        <div class="cadastro_content">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" value="" placeholder="Enter your Email" required><br><br>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="" placeholder="Enter your Password" required><br>

          <input type="submit" value="Submit">
          <p class="centeralize">Não possui conta? <a href="cadastro.php">Cadastre-se!</a></o>
        </div>
      </fieldset>
    </form>
  </div>
  <footer>
    <p id="footer_content">Este site foi feito por Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

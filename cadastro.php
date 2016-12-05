<?php

  include("common/conexao.php");

  session_start();
  session_destroy();

  if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpf']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $cpf = $_POST['cpf'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['email'];
    $password =   password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO `adm` (idadm, nome_adm, sobrenome_adm, email_adm, cpf_adm, senha_adm, hidden) VALUES (NULL, '$firstname', '$lastname', '$username', '$cpf', '$password', DEFAULT)";
    $result = mysqli_query($mysqli, $query);
    if($result){
      echo "Sucesso!";
    } else {
      echo "Falha!";
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
          <label for="cpf">CPF</label>
          <input type="text" id="cpf" name="cpf" value="" placeholder="Entre seu CPF" required><br><br>

          <label for="firstname">First Name</label>
          <input type="text" id="firstname" name="firstname" value="" placeholder="Enter your Name" required><br><br>

          <label for="lastname">Last Name</label>
          <input type="text" id="lastname" name="lastname" value="" placeholder="Enter your Last Name" required><br><br>

          <label for="email">Email</label>
          <input type="text" id="email" name="email" value="" placeholder="Enter your Email" required><br><br>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="" placeholder="Enter your Password" required><br><br>

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

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

      if(isset($_GET["escolha"]) && isset($_GET["idexclusao"])){
        $escolha = $_GET["escolha"];
        if ($escolha == 1){
          $idexclusao = $_GET["idexclusao"];
          $query1 = "DELETE FROM lojascategorias WHERE idloja = $idexclusao";
          $result1 = mysqli_query($mysqli, $query1);
          $query2 = "DELETE FROM loja WHERE idloja = $idexclusao";
          $result2 = mysqli_query($mysqli, $query2);
          if ($mysqli->error){
            ?>
            <script>
              alert('Erro!');
            </script>
            <?php
          } else {
            header("location:index.php");
          }
        }
      }

      if(isset($_GET["idexclusao"])) {
        $idexclusao = $_GET["idexclusao"];
        $query = "SELECT * FROM loja WHERE idloja = $idexclusao";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $estabelecimento) {
          echo "Deseja excluir o valor <b>".utf8_encode($estabelecimento['nome_loja'])."</b>?";
        }

        echo "<br/><br/><a href='processaexcluirloja.php?escolha=1&idexclusao=$idexclusao'>Sim!</a><br/><br/>";
        echo "<a href='index.php'>Não!</a>";

      } else {
        echo "Houve um erro!";
      }
    ?>
  </div>

  <footer>
    <p id="footer_content">Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

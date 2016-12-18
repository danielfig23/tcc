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

          $query2 = "DELETE FROM categorias WHERE idcategorias = $idexclusao";
          $result2 = mysqli_query($mysqli, $query2);
          if ($mysqli->error){
            ?>
            <script>
              alert('Impossível excluir a categoria possui lojas cadastradas!');
            </script>
            <?php
          } else {
            header("location:cadastroloja.php");
          }
        }
      }

      if(isset($_GET["idexclusao"])) {
        $idexclusao = $_GET["idexclusao"];
        $query = "SELECT * FROM categorias WHERE idcategorias = $idexclusao";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $categorias) {
          echo "Deseja excluir o valor <b>".utf8_encode($categorias['descricao'])."</b>?";
        }

        echo "<br/><br/><a href='processaexcluircategoria.php?escolha=1&idexclusao=$idexclusao'>Sim!</a><br/><br/>";
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

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

      $per_page = 3;

      if (isset($_GET["page"])){
          $page = $_GET["page"];
      } else {
        $page = 1;
      }

      $start_from = ($page-1)*$per_page;
      $query = "SELECT * FROM estabelecimento LIMIT $start_from, $per_page";
      $result = mysqli_query($mysqli, $query);
      foreach ($result as $estabelecimento) {

        if ($estabelecimento['caminhoimagem'] == NULL){
          $caminhoimagem = "images/index.png";
        } else {
          $caminhoimagem = $estabelecimento['caminhoimagem'];
        }

        echo '<h3><a href="shopping.php?idshopping='.$estabelecimento["idestabelecimento"].'">'.utf8_encode($estabelecimento["nome_estabelecimento"]).'</a></h3>';

        if(isset($_SESSION["user"])){
          echo "<h4> <a href='processaeditarshopping.php?idedicao=".$estabelecimento["idestabelecimento"]."'>Editar</a> - <a href='processaexcluirshopping.php?idexclusao=".$estabelecimento["idestabelecimento"]."'>Excluir</a></h4>";
        }

        echo "<img class='fotoloja' src='$caminhoimagem'></img>";
        echo '<p>'.utf8_encode($estabelecimento['descricao']).'</p>';
        echo "<br/>";
      }

      $query2 = "SELECT * FROM estabelecimento";
      $result2 = mysqli_query($mysqli, $query2);
      $total_records = $result2->num_rows;
      $total_pages = ceil($total_records/$per_page);
      echo "<center><a class='link' href='index.php'>".'Página Inicial!'."</a>";

      for ($i=1;$i<=$total_pages;$i++){
        echo "<a class='link' href='index.php?page=".$i."'>".$i."</a>";
      };

      echo "<a class='link' href='index.php?page=$total_pages'>".'Última Página!'."</a></center>";
    ?>
  </div>

  <footer>
    <p id="footer_content">Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
  <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

  <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
</head>
<body>

  <script type="text/javascript">
  	$(document).ready(function() {
  		$(".fancybox").fancybox();
  	});
  </script>

  <?php include ("common/header.php"); ?>
  <?php include ("common/navbar.php"); ?>

  <div class="content">
    <?php
    include("common/conexao.php");

    if(isset($_GET["idshopping"])) {
      $idshopping = $_GET["idshopping"];
      $query = 'SELECT * FROM estabelecimento WHERE idestabelecimento = '.$idshopping.'';
      $result =  mysqli_query($mysqli, $query);
      $nomeshopping = mysqli_fetch_assoc($result);
      echo '<h2 class="shopping">'.utf8_encode($nomeshopping['nome_estabelecimento']).'</h2>';
    }
    ?>

    <?php
      include("common/conexao.php");
      if(isset($_GET["id"])) {
        echo "<h3>Lojas</h3>";

        $id = $_GET["id"];
        $query = "SELECT * FROM lojascategorias, loja, categorias, estabelecimento, shopping_box
        WHERE loja.idloja = lojascategorias.idloja
        AND lojascategorias.idcategorias = categorias.idcategorias
        AND categorias.idcategorias = $id
        AND loja.idbox = shopping_box.idbox
        AND shopping_box.idestabelecimento = estabelecimento.idestabelecimento
        AND estabelecimento.idestabelecimento = $idshopping";

        $result = mysqli_query($mysqli, $query);

        foreach ($result as $loja) {
          
          $id = $loja["idloja"];
          $querya = "SELECT * FROM loja WHERE idloja=$id";
          $resulta = mysqli_query($mysqli, $querya);
          $des = mysqli_fetch_assoc($resulta);
          $desc = $des ["descricao"];

          echo '<a href="shopping.php?idloja='.$loja["idloja"].'">'.utf8_encode($loja["nome_loja"]).'</a><br/>';
          echo '<p>'.utf8_encode($desc).'</p>';
        }
      } elseif (isset($_GET["idloja"])) {
        $id = $_GET["idloja"];
        $query = "SELECT * from loja WHERE idloja = $id";
        $result = mysqli_query($mysqli, $query);

        foreach ($result as $n_loja) {

          if ($n_loja['caminhoimagem'] == NULL){
            $caminhoimagem = "images/index.png";
          } else {
            $caminhoimagem = $n_loja['caminhoimagem'];
          }

          $id = $n_loja['idloja'];
          $query2 = "SELECT nome_box from shopping_box, loja WHERE loja.idloja = $id AND loja.idbox = shopping_box.idbox";
          $result2 = mysqli_query($mysqli, $query2);
          $nomebox = mysqli_fetch_assoc($result2);
          $nomeb = utf8_encode($nomebox['nome_box']);

          echo '<h3>'.utf8_encode($n_loja["nome_loja"]).'</h3>';
          if(isset($_SESSION["user"])){
            echo "<h4> <a href='processaeditarloja.php?idedicao=".$id."'>Editar</a> - <a href='processaexcluirloja.php?idexclusao=".$id."'>Excluir</a></h4>";
          }
          echo "<a id='single_1' title='Box: $nomeb' href='$caminhoimagem'><img class='fotoloja' src='$caminhoimagem' alt=''/></a>";
          echo '<p>'.utf8_encode($n_loja['descricao']).'</p>';
        }
      } else {
        echo "<h2>Categorias</h2>";
        $query = "SELECT * FROM categorias";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $categ) {
          echo '<a href="shopping.php?idshopping='.$idshopping.'&id='.$categ["idcategorias"].'">'.utf8_encode($categ["descricao"]).'</a><br/>';
          echo '<p>'.utf8_encode($categ['descricao_categoria']).'</p>';
        }
      }
    ?>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#single_1").fancybox({
        helpers: {
          title : {
            type : 'float'
          }
        }
      });
    });
  </script>

  <footer id="footer_content">
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer>
</body>
</html>

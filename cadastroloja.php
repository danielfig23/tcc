<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if (isset($_POST['nomeloja']) && isset($_POST['descricaoloja']) && isset($_POST['estabelecimento']) && isset($_POST['shopping_box']) && isset($_POST["checkboxvar"])) {

    $nomeloja = $_POST['nomeloja'];
    $descricaoloja = $_POST['descricaoloja'];
    $estabelecimento = $_POST['estabelecimento'];
    $imagemmarca = $_FILES["imagemmarca"];
    $imagemfachada = $_FILES["imagemfachada"];
    $categorias = $_POST["checkboxvar"];
    $shopping_box = $_POST["shopping_box"];

    if($imagemmarca != NULL) {
      $nomeFinalMarca = time().'marca.jpg';
      if (move_uploaded_file($imagemmarca['tmp_name'], $nomeFinalMarca)) {
        $tamanhoImgMarca = filesize($nomeFinalMarca);
        $mysqlImgMarca = addslashes(fread(fopen($nomeFinalMarca, "r"), $tamanhoImgMarca));
        unlink($nomeFinalMarca);
        echo "FUNCIONOU O TRATAMENTO DA IMAGEM DA MARCA";
      } else {
        echo "Deu errado o segundo IF da marca";
      }
    } else {
      echo "Você não cadastrou uma imagem correta!";
    }

    if($imagemfachada != NULL) {
      $nomeFinalFachada = time().'fachada.jpg';
      if (move_uploaded_file($imagemfachada['tmp_name'], $nomeFinalFachada)) {
        $tamanhoImgFachada = filesize($nomeFinalFachada);
        $mysqlImgFachada = addslashes(fread(fopen($nomeFinalFachada, "r"), $tamanhoImgFachada));
        unlink($nomeFinalFachada);
        echo "FUNCIONOU O TRATAMENTO DA IMAGEM DA FACHADA";
      } else {
        echo "Deu errado o segundo IF DA FACHADA";
      }
    } else {
      echo "Você não cadastrou uma imagem correta!";
    }

    $queryprocura = "SELECT idbox FROM `loja`";
    $resultprocura = mysqli_query($mysqli, $queryprocura);

    foreach ($resultprocura as $id) {
      echo $id["idbox"];
      if ($shopping_box === $id["idbox"]){

        ?>
        <script>
          alert('Essa box já está ocupada! Por favor confira suas informações!');
        </script>"

        <?php
        die ();
        header("location:cadastroloja.php");
      }
    }

    $query = "INSERT INTO `loja` (idloja, localizacao_loja, nome_loja, idestabelecimento, descricao, logoloja, fotofachada, idbox) VALUES (NULL, DEFAULT, '$nomeloja', '$estabelecimento', '$descricaoloja', '$mysqlImgMarca', '$mysqlImgFachada', '$shopping_box')";
    $result = mysqli_query($mysqli, $query);

    if($result){
      echo "Sucesso na primeira inclusão";
    } else {
      echo "Falha na primeira inclusão!";
    }

    $querymax = "SELECT MAX(idloja) AS idloja FROM `loja`";
    $resultmax = mysqli_query($mysqli, $querymax);
    $idlojamax = mysqli_fetch_assoc($resultmax);
    $idlojamaxfinal = $idlojamax ["idloja"];

    foreach ($categorias as $categoria => $value) {
      $querycategs = "INSERT INTO `lojascategorias` (idcategorias, idloja) VALUES ('$value', '$idlojamaxfinal')";
      $resultcategs = mysqli_query($mysqli, $querycategs);

      if ($resultcategs){
        echo "Funcionou o cadastro da loja em todas as tabelas";
      } else {
        echo "Tá falhando no ultimo result";
      }
    }


  } else {
    echo $_POST['descricaoshopping'];
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
    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">

          <label for="nomeloja">Nome da Loja</label>
          <input type="text" id="nomeloja" name="nomeloja" value="" placeholder="Entre com o Nome da Loja" required>

          <br>
          <br>

          <label for="descricaoloja">Descrição da Loja</label>
          <input type="text" id="descricaoloja" class="grande" name="descricaoloja" value="" placeholder="Entre com a localização da Loja" required>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM estabelecimento";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione um Estabelecimento</label>
          <select name="estabelecimento">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idestabelecimento'] ?>"><?php echo utf8_encode($prod['nome_estabelecimento']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM shopping_box";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione uma Box</label>
          <select name="shopping_box">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idbox'] ?>"><?php echo utf8_encode($prod['nome_box']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <label for="">Categorias da Loja</label>
          <br />
          <?php
            $sqlcategorias = "select * from categorias;";
            $resultcategorias = mysqli_query($mysqli, $sqlcategorias);
            while ($linhacategorias = mysqli_fetch_array($resultcategorias)) {
              $idcateg = $linhacategorias["idcategorias"];
              $desccateg = $linhacategorias["descricao"];
              echo "<br><input type='checkbox' name='checkboxvar[]' value='$idcateg'/>".
                  utf8_encode($desccateg);
            }
          ?>

          <br>
          <br>

          <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
          <label for="imagem">Imagem (Marca)</label>

          <br>
          <br>

          <fieldset>
		         <input type="file" name="imagemmarca"/>
          </fieldset>

          <br>

          <label for="imagem">Imagem (Fachada)</label>

          <br>
          <br>

          <fieldset>
             <input type="file" name="imagemfachada"/>
          </fieldset>

          <br>

          <input type="submit" value="Cadastrar">
        </div>
      </fieldset>
    </form>
  </div>

  <footer id="footer_content">
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer>
</body>
</html>

<?php
include("conexao.php");




$nomeloja = $_POST['nomeloja'];
$localizacaoloja = $_POST['localizacaoloja'];
$descricaoloja = $_POST['descricaoloja'];

$imagem = $_FILES["imagem"];



?>

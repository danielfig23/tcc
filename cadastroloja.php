<?php
  include("conexao.php");

  if (isset($_POST['nomeloja']) && isset($_POST['descricaoloja']) && isset($_POST['estabelecimento']) && isset($_POST['descricaoshopping'])) {

    $nomeloja = $_POST['nomeloja'];
    $descricaoloja = $_POST['descricaoloja'];
    $estabelecimento = $_POST['estabelecimento'];
    $imagemmarca = $_FILES["imagemmarca"];
    $imagemfachada = $_FILES["imagemfachada"];

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

    $query = "INSERT INTO `loja` (idloja, localizacao_loja, nome_loja, idestabelecimento, descricao, logoloja, fotofachada, idbox) VALUES (NULL, NULL, '$nomeloja', '$estabelecimento', '$descricaoloja', $mysqlImgMarca, $mysqlImgFachada, NULL)";
    $result = mysqli_query($mysqli, $query);

    if($result){
      echo "Sucesso!";
    } else {
      echo "Falha!";
    }
  } else {
    echo $_POST['cidade'];
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
    <form enctype="multipart/form-data" action="upload.php" method="post">
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

          <label for="">Selecione um Estabelecimento</label>
          <select name="shopping_box">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idbox'] ?>"><?php echo utf8_encode($prod['nome_box']) ?></option>
            <?php } ?>
          </select>

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

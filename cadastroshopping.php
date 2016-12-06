<?php
  include("common/conexao.php");
  require('common/check_loggedin.php');
  if (isset($_POST['nomeshopping']) && isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['localizacaoshopping']) && isset($_POST['descricaoshopping'])) {

    $nomeshopping = $_POST['nomeshopping'];
    $cidade = $_POST['cidade'];
    $localizacaoshopping = $_POST['localizacaoshopping'];
    $descricaoshopping = $_POST['descricaoshopping'];
    $imagem = $_FILES["imagem"];

    if($imagem != NULL) {
      $nomeFinal = time().'.jpg';
      if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal);
        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
        unlink($nomeFinal);
        echo "FUNCIONOU O TRATAMENTO DA IMAGEM";
      } else {
        echo "Deu errado o segundo IF";
      }
    } else {
      echo "Você não cadastrou uma imagem correta!";
    }

    $query = "INSERT INTO `estabelecimento` (idestabelecimento, nome_estabelecimento, idcidade, horarioabeds, horariofecds, horarioabedom, horariofecdom, endereco, mapa, descricao) VALUES (NULL, '$nomeshopping', '$cidade', DEFAULT, DEFAULT, DEFAULT, DEFAULT, '$localizacaoshopping', '$mysqlImg', '$descricaoshopping')";
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

  <?php include ("common/header.php"); ?>
  <?php include ("common/navbar.php"); ?>

  <div class="cadastro">

    <form enctype="multipart/form-data" method="post">
      <fieldset>
        <div class="cadastro_content">
          <label for="nomeshopping">Nome do Shopping</label>
          <input type="text" id="nomeshopping" name="nomeshopping" value="" placeholder="Entre com o Nome do Shopping" required>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM estado";
            $result_estado = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione o Estado</label>
          <select name="estado">
            <?php while($prod = mysqli_fetch_assoc($result_estado)) { ?>
              <option value="<?php echo $prod['id'] ?>"><?php echo utf8_encode($prod['nome']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <?php
            include("conexao.php");
            $query = "SELECT * FROM cidade";
            $result = mysqli_query($mysqli, $query);
          ?>

          <label for="">Selecione a Cidade</label>
          <select name="cidade">
            <?php while($prod = mysqli_fetch_assoc($result)) { ?>
              <option value="<?php echo $prod['idcidade'] ?>"><?php echo utf8_encode($prod['nome_cidade']) ?></option>
            <?php } ?>
          </select>

          <br>
          <br>

          <label for="localizacaoshopping">Localização do Shopping</label>
          <input type="text" id="localizacaoshopping" name="localizacaoshopping" value="" placeholder="Entre com a Localização do shopping (endereço)" required>

          <br>
          <br>

          <label for="descricaoshopping">Descrição do Shopping</label>
          <input type="text" id="descricaoshopping" class="grande" name="descricaoshopping" value="" placeholder="Entre com a Descrição do Shopping" required>

          <br>
          <br>

          <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
          <label for="imagem">Imagem (Mapa)</label><br><br>
          <fieldset>
		         <input type="file" id="imagem" name="imagem"/>
          </fieldset>

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

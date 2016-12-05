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

  <div class="content">
    <fieldset>
      <div class="contato_content_esquerda">
        <label for="nomecontato">Seu Nome</label>
        <input type="text" id="nomecontato" value="" placeholder="Escreva seu Nome"><br>

        <label for="emailcontato">Seu Email</label>
        <input type="text" id="emailcontato" value="" placeholder="Escreva seu Endereço de Email"><br>
      </div>

      <div class="contato_content_direita">
        <label for="mensagemcontato">Sua Mensagem</label>
        <input type="text" id="mensagemcontato" value="" placeholder="Escreva seu Endereço de Email"><br>
      </div>
    </fieldset>
    <br/>
    <input type="submit" value="Submit">
  </div>

  <!-- <footer>
    <span>Este site foi feito por Daniel Figueredo e Henrique Zanin</span>
  </footer> -->
</body>
</html>

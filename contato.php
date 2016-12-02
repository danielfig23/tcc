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

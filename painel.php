<!DOCTYPE html>
<html>
<head>
  <title>Início</title>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="style.css">

  <?php
    include("conexao.php")
  ?>

</head>
<body>

  <header>
    <h1>Isto é um header do ADMINISTRADOR.</h1>
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
      <li class="dropdown">
        <a href="#" class="dropbtn">Cadastrar</a>
      <div class="dropdown-content">
        <a href="#">Cadastrar Shoppings</a>
        <a href="#">Cadastrar Categorias</a>
        <a href="#">Cadastrar Lojas</a>
      </div>
      </li>
      <li style="float:right"><a href="login.php">Login</a></li>
      <li style="float:right"><a href="cadastro.php">Register</a></li>
    </ul>
  </nav>

  <div class="content">
    <a href="garten.php"><h3 class="shopping">Garten Shopping</h3></a>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in massa eget dui sodales consequat. Praesent id sapien magna. Etiam in justo ac ipsum aliquam imperdiet. Integer non mi ullamcorper, lobortis sem sit amet, sollicitudin ex. Praesent gravida, nulla quis imperdiet tincidunt, nibh libero consequat magna, vel hendrerit lacus erat quis ligula. Quisque cursus est vitae sagittis tempor. Vivamus semper leo ex, ac varius sapien bibendum eget. Mauris congue fermentum ligula, nec ullamcorper metus pharetra nec. Suspendisse a lobortis massa, vel consectetur purus. Aliquam bibendum auctor leo id consequat. Fusce elementum ex tempor massa ultrices, a elementum nisl placerat. Proin id odio tincidunt, porta leo id, interdum odio. Proin luctus quam mi, eu varius orci aliquet quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam auctor enim ante, vitae laoreet ipsum ullamcorper pharetra. Etiam quam nulla, vulputate eget magna in, scelerisque cursus ligula.</p>
    <a href="patiochapeco.php"><h3 class="shopping">Shopping Chapeco</h3></a>
    <p>Curabitur ullamcorper aliquet lacinia. Mauris viverra finibus euismod. Donec odio nisi, scelerisque quis venenatis eu, porttitor a nisi. Mauris velit ex, imperdiet sit amet auctor non, faucibus a odio. Nullam faucibus erat quis neque ullamcorper, nec mattis mi feugiat. Etiam quis consectetur diam. Vestibulum eget mattis magna. Curabitur tristique justo at leo gravida aliquet. Phasellus pellentesque consectetur tellus ut pellentesque. Curabitur sodales ipsum dui, id sodales est luctus id. Proin consequat eleifend metus, a euismod ante. Curabitur varius ex urna, congue dictum augue eleifend eget. Nulla augue massa, volutpat quis leo vitae, interdum semper erat. </p>
    <a href="continente.php"><h3 class="shopping">Shopping Continente</h3></a>
    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed viverra efficitur mi et aliquet. Vivamus commodo, libero non efficitur imperdiet, lacus nibh maximus elit, scelerisque tempus dolor nibh a lacus. Donec et malesuada erat. Integer finibus quam magna, ut dictum nunc consequat non. Vivamus vitae nunc a massa feugiat viverra. Suspendisse potenti. Maecenas consequat tincidunt nunc, a rutrum eros pulvinar nec. Etiam congue magna vel nibh faucibus blandit. Proin sed egestas orci, vitae dapibus mi. Mauris eleifend quam eros. Phasellus sit amet massa a lectus rhoncus euismod ut non augue. Nam ullamcorper justo id diam semper, at sodales libero tincidunt. </p>
  </div>

  <footer>
    <p id="footer_content">Este site foi feito por Daniel Figueredo e Henrique Zanin</p>
  </footer>
</body>
</html>

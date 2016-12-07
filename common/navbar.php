<nav>
  <ul class="ulnav">
    <li><a href="index.php">Início</a></li>
    <li><a href="contato.php">Contato</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Shoppings</a>
      <div class="dropdown-content">
        <a href="garten.php">Garten Shopping</a>
        <a href="patiochapeco.php">Shopping Chapecó</a>
        <a href="continente.php">Continente Shopping</a>
        <?php
          session_start();
          if(isset($_SESSION["user"])){
            echo '
            <li class="dropdown">
              <a href="#" class="dropbtn">Cadastrar</a>
              <div class="dropdown-content">
                <a href="cadastroshopping.php">Cadastrar Shoppings</a>
                <a href="cadastrocategoria.php">Cadastrar Categorias</a>
                <a href="cadastrobox.php">Cadastrar Box</a>
                <a href="cadastroloja.php">Cadastrar Lojas</a>
              </div>
            </li>';
          }
        ?>
      </div>
    </li>

    <?php
      session_start();
      if(isset($_SESSION["user"])){
        echo "<li style='float:right'><a href='login.php'>Logout</a></li>";
      }
      else {
        echo "<li style='float:right'><a href='login.php'>Login</a></li>";
        echo "<li style='float:right'><a href='cadastro.php'>Register</a></li>";
      }
    ?>
  </ul>
</nav>

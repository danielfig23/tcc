

Depois deverá ser utilizado o código abaixo. Dentro do foreach, executar insert para cadastrar as categorias
da loja, na tabela lojascategorias.
Essa tabela tem dois campos, sendo que o idloja é o valor que foi atribuído à variável, e o idcateogoria
é o $value que consta dentro do foreach
-->


<?php
  if (isset($_POST["checkboxvar"])) {
    $categorias = $_POST["checkboxvar"];
    foreach ($categorias as $categoria => $value) {
      echo "<br>categ $value";
    }
  }
?>

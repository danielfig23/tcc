<!--
Antes de executar o código abaixo, terá de cadastrar a loja na tabela loja (insert into loja........)

Depois de inserir a loja, deverá ser pego o último idloja inserido na tabela loja, usando o sql:
select max(idloja) as idloja from loja;
Este idloja deverá ser atribuído à uma variável

Depois deverá ser utilizado o código abaixo. Dentro do foreach, executar insert para cadastrar as categorias
da loja, na tabela lojascategorias.
Essa tabela tem dois campos, sendo que o idloja é o valor que foi atribuído à variável, e o idcateogoria
é o $value que consta dentro do foreach
-->


<?php
  if (isset($_POST["checkboxvar"])) {
    echo utf8_encode($nomeloja);
    $categorias = $_POST["checkboxvar"];
    echo $categorias;
    foreach ($categorias as $categoria => $value) {
      echo "<br>categ $value";
    }
  }
?>

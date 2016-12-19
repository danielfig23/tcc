<?php
  $host = "localhost";
  $usuario = "root";
  $senha = "root";
  $db = "mapstrack";
  $db2 = "cidades";
  $mysqli = new mysqli($host, $usuario, $senha);

  if($mysqli->connect_errno){
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
  }

  $select_db = mysqli_select_db($mysqli, $db2);
  $query = "SELECT * FROM `tb_estados`";
  $result = mysqli_query($mysqli, $query);
  $select_db = mysqli_select_db($mysqli, $db);

  foreach ($result as $est) {
    $id = $est['id'];
    $uf = $est['uf'];
    $nome = $est['nome'];
    $pais = "Brasil";

    // $query = "INSERT INTO `estado` (id, nome, uf, pais) VALUES ('$id', '$nome', '$uf', '$pais')";

    if ($uf == 'SC'){
      $query = "INSERT INTO `estado` (id, nome, uf, pais) VALUES ('$id', '$nome', '$uf', '$pais')";
      $result = mysqli_query($mysqli, $query);
    }
  }

  $select_db = mysqli_select_db($mysqli, $db2);
  $query = "SELECT * FROM `tb_cidades`";
  $result = mysqli_query($mysqli, $query);
  $select_db = mysqli_select_db($mysqli, $db);

  foreach ($result as $cid) {
    $id =  $cid['id'];
    $nome = $cid ['nome'];
    $uf = $cid['uf'];

    if ($uf == 'SC'){
      $query = "INSERT INTO `cidade` (idcidade, nome_cidade, uf_cidade) VALUES ('$id', '$nome', '$uf')";
      $result = mysqli_query($mysqli, $query);
    }
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
</body>

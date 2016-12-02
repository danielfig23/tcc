<?php

$host = "localhost";
$usuario = "root";
$senha = "root";
$db = "mapstrack";

$mysqli = new mysqli($host, $usuario, $senha);

if($mysqli->connect_errno){
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
}

$select_db = mysqli_select_db($mysqli, $db);

if (!$select_db){
    die("Database Selection Failed" . mysqli_error($select_db));
}
?>

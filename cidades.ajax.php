<?php

	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );
	include("common/conexao.php");
	$cod_estados = mysqli_real_escape_string($mysqli, $_REQUEST['cod_estados']);
	$cidades = array();
	$uf = "SC";
	$query = "SELECT idcidade as cod_cidades, nome_cidade FROM cidade WHERE uf_cidade=$uf ORDER BY nome_cidade";
	$result = mysqli_query($mysqli, $query);
	while ($row = mysqli_fetch_array($result)) {
		echo "bla";
		$cidades[] = array('cod_cidades' => $row['cod_cidades'], 'nome_cidade' => $row['nome_cidade'],);
	}
	echo( json_encode( $cidades ) );
?>

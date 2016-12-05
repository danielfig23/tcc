<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$host = "localhost";
	$usuario = "root";
	$senha = "root";
	$bd = "mapstrack";

	$conexao = new mysqli($host, $usuario, $senha, $bd);
	mysqli_set_charset($conexao, "utf8");

	$cod_estados = mysqli_real_escape_string($conexao, $_REQUEST['cod_estados']);

	$cidades = array();

	$sql = "SELECT id as cod_cidades, nome
			FROM cidades
			WHERE estado=$cod_estados
			ORDER BY nome";
	$res = mysqli_query( $conexao, $sql );
	while ( $row = mysqli_fetch_array( $res ) ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['cod_cidades'],
			'nome'			=> $row['nome'],
		);
	}

	echo( json_encode( $cidades ) );
?>

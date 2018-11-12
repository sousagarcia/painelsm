<?php
	include 'abreConexao.php';
	
	$query = mysql_query("SELECT aux FROM aux_painel");
	while($aux = mysql_fetch_array($query)){
		$valor = $aux['aux'];
	}
	
	echo $valor;
	header("refresh:0; url=../../index.php");
?>
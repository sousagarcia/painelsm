<?php
	include 'sql/insert/abreConexao.php';
	
	for($i = 2634; $i<=2719; $i++){
		$sql = "INSERT INTO gerenciamento_painel(senha_atual, status, usuario)";
		$sql .= " VALUES('".$i."', 'Atendido', '2')";
		mysql_query($sql) or die(mysql_error());
	}
?>
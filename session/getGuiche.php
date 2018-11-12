<?php
	session_start();
	error_reporting(0);
	include 'abreConexao.php';
	
	$query3 = "SELECT login_atual FROM aux_login";
    $result3 = mysql_query($query3);
    while($row3 = mysql_fetch_array($result3)){
		$var4 = $row3['login_atual'];
    }
	
	$query2 = "SELECT tipo_atendimento FROM cadastro_usuario WHERE login='".$var4."'";
    $result2 = mysql_query($query2);
    while($row2 = mysql_fetch_array($result2)){
		$var3 = $row2['tipo_atendimento'];
    }
	
	$query = "SELECT senha_atual, status, usuario FROM gerenciamento_painel WHERE tipo_senha='".$var3."' ORDER BY prioridade DESC LIMIT 1";
    $result = mysql_query($query);
    while($row = mysql_fetch_array($result)){
		$var = $row['usuario'];
    }
	printf("%02s\n", $var);
?>
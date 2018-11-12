<?php
	include 'abreConexao.php';
	error_reporting(0);
	session_start();
	
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
	
	$query = "SELECT senha_atual, status, prioridade, usuario, tipo_senha FROM gerenciamento_painel WHERE tipo_senha='".$var3."' ORDER BY prioridade DESC LIMIT 1";
    $result = mysql_query($query);
    while($row = mysql_fetch_array($result)){
		$var = $row['senha_atual'];
		$var2 = $row['tipo_senha'];
    }
		
	if($var2 == 'P'){
		$tipo = 'P';
	}
	
	else{
		$tipo = 'C';
	}
	
	printf($tipo."%04s\n", $var);
?>
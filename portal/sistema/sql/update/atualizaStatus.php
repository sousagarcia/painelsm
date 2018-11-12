<html> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

<?php
	include 'abreConexao.php';
	error_reporting(0);
	session_start();
	
	$var = $_GET['valor'];
	
	if($var == "atendido"){
		$update = "UPDATE gerenciamento_painel SET status='Atendido' WHERE senha_atual='".$_SESSION['ultima_chamada']."'";
		mysql_query($update) or die(mysql_error());
		
		$_SESSION['status-at'] = "Atendido";
		header("refresh:0; url=../../index.php");
	}
	
	else if($var == "nao-atendido"){
		$update = "UPDATE gerenciamento_painel SET status='Não Compareceu' WHERE senha_atual='".$_SESSION['ultima_chamada']."'";
		mysql_query($update) or die(mysql_error());
	
		$_SESSION['status-at'] = "Não Atendido";
		header("refresh:0; url=../../index.php");
	}
?>
</html>
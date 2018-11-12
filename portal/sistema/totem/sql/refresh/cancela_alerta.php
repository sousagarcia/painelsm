<?php
	sleep(2);
	include 'abreConexao.php';
	
	$update = "UPDATE aux_painel SET aux='0'";
	mysql_query($update) or die(mysql_error());
	
	header("refresh:0; url=auxiliar.php");
?>
<?php
session_start();
include 'abreConexao.php';

	if($_GET['value'] == 'comum'){
		$_SESSION['auxilia-prioritaria'] = 0;
		$_SESSION['prioritaria'] = 0;
		$update = "UPDATE cadastro_usuario SET tipo_atendimento='C' WHERE login='".$_SESSION['login']."'";
		mysql_query($update) or die(mysql_error());
	}
	
	else{
		$_SESSION['auxilia-prioritaria'] = 1;
	}
	
		
			//Decrementa preferenciais.							
				
				if($_GET['value']=="preferencial"){					
					$update = "UPDATE npreferencial SET preferencia = preferencia - 1 WHERE id = 1";
					mysql_query($update) or die(mysql_error());				
				}		
			
			
	
	header("refresh:0; url=../../index.php");
?>
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
				$query6 = "SELECT preferencia FROM npreferencial WHERE id = 1";
					$result = mysql_query($query6);
				
						while($row = mysql_fetch_array($result)){
							$preferencia = $row['preferencia'];
						}				
				if($_GET['value']=="preferencial" and $preferencia != 0) {					
					$update = "UPDATE npreferencial SET preferencia = preferencia - 1 WHERE id = 1";
					mysql_query($update) or die(mysql_error());				
				}		
			
			
	
	header("refresh:0; url=../../index.php");
?>
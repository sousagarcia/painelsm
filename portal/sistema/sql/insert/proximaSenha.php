<?php
	include 'abreConexao.php';
	session_start();
	
	date_default_timezone_set('America/Sao_Paulo');
	  
	  
	  $data_aux = date("d-m-Y");
	  $data = date("Y-m-d", strtotime($data_aux));
	  $hora = date('H:i:s');
	
	$update0 = "ALTER TABLE gerenciamento_painel ADD data DATE,ADD hora TIME";
	mysql_query($update0);
	
	if($_SESSION['status-at'] == "Chamada"){
		echo "<script>alert('Selecione um status antes de chamar a pr&oacute;xima senha.')</script>";
		header("refresh:0; url=../../index.php");
	}
	
	else{
		$update = "UPDATE gerenciamento_painel SET prioridade='0'";
		mysql_query($update) or die(mysql_error());
		
		$result = mysql_query("SELECT COUNT(*) as calculo FROM gerarsenha WHERE tipo_senha='P' AND status='Nao Atendida'");
		$data1 = mysql_fetch_assoc($result);
		$aux = $data1['calculo'];
		
		$query2 = "SELECT numero_senha FROM gerarsenha WHERE status='Nao Atendida' AND tipo_senha='P' ORDER BY numero_senha ASC LIMIT 1";
		$result7 = mysql_query($query2);
		while($row = mysql_fetch_array($result7)){
			$var200 = $row['numero_senha'];
			echo $var200;
		}
		
		$update1000 = "UPDATE aux_login SET login_atual='".$_SESSION['login']."'";
		mysql_query($update1000) or die(mysql_error());
		
		$result14 = mysql_query("SELECT COUNT(*) as calculo FROM gerarsenha WHERE tipo_senha='C' AND status='Nao Atendida'");
		$data14 = mysql_fetch_assoc($result14);
		$aux14 = $data14['calculo'];
		
		$query122 = "SELECT numero_senha FROM gerarsenha WHERE status='Nao Atendida' AND tipo_senha='C' ORDER BY numero_senha ASC LIMIT 1";
		$result127 = mysql_query($query122);
		while($row122 = mysql_fetch_array($result127)){
			$var20012 = $row122['numero_senha'];
			echo $var20012;
		}
		
		if($_SESSION['auxilia-prioritaria'] == 1){
			$update = "UPDATE cadastro_usuario SET tipo_atendimento='P' WHERE login='".$_SESSION['login']."'";
			mysql_query($update) or die(mysql_error());
			
			if($_GET['valor'] == "proxima"){
				if($aux <= 0){
					echo "<script>alert('N&atilde;o h&aacute; mais senhas preferenciais para serem atendidas no momento.')</script>";
					header("refresh:0; url=../../index.php");
				}
					
				else {
					if(($_SESSION['ultima_chamada']) != null){
						$update = "UPDATE gerenciamento_painel SET status='Atendido' WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='P'";
						mysql_query($update) or die(mysql_error());
						
						$update100 = "UPDATE gerarsenha SET status='Atendido' WHERE numero_senha='".($var200)."' AND tipo_senha='P'";
						mysql_query($update100) or die(mysql_error());
					
						$sql = "INSERT INTO gerenciamento_painel(senha_atual, status, usuario, tipo_senha, data, hora)";
						$sql .= " VALUES('".($var200)."', 'Chamada', '".$_SESSION['guiche']."', 'P', '$data','$hora')";
						mysql_query($sql) or die(mysql_error());
						
						$update11 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($var200)."'";
						mysql_query($update11) or die(mysql_error());
						
						$_SESSION['status-at'] = "Chamada";
					}
						
					else{
						$sql3 = "INSERT INTO gerenciamento_painel(senha_atual, status, usuario, tipo_senha, data, hora)";
						$sql3 .= " VALUES('".($var200)."', 'Chamada', '".$_SESSION['guiche']."', 'P', '$data','$hora')";
						mysql_query($sql3) or die(mysql_error());
						
						$update100 = "UPDATE gerarsenha SET status='Atendido' WHERE numero_senha='".($var200)."' AND tipo_senha='P'";
						mysql_query($update100) or die(mysql_error());
						
						$update11 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($var200)."'";
						mysql_query($update11) or die(mysql_error());
					}
					
					$_SESSION['ultima_chamada'] = ($var200);
					
					$update = "UPDATE aux_painel SET aux='1'";
					mysql_query($update) or die(mysql_error());
					header("refresh:0; url=../refresh/cancela_alerta.php");
				}
			}
				
			else{
				$query1 = "SELECT senha_atual, status, prioridade, usuario, tipo_senha FROM gerenciamento_painel ORDER BY prioridade DESC LIMIT 1";
				$result1 = mysql_query($query1);
				while($row1 = mysql_fetch_array($result1)){
					$var = $row1['senha_atual'];
					$var2 = $row1['usuario'];
						$query = mysql_query("SELECT id, senha_atual, status, usuario, tipo_senha FROM gerenciamento_painel WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='P'");
						while($senha = mysql_fetch_array($query)){
							$ultima_senha = $senha['senha_atual'];
							
							$sql2 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='P'";
							mysql_query($sql2) or die(mysql_error());
						}
								
						$update = "UPDATE aux_painel SET aux='1'";
						mysql_query($update) or die(mysql_error());
						header("refresh:0; url=../refresh/cancela_alerta.php");
				}
			}
		}
		
		else{
			if($_GET['valor'] == "proxima"){
				if($aux14 <= 0){
					echo "<script>alert('N&atilde;o há mais senhas comuns para serem atendidas no momento.')</script>";
					header("refresh:0; url=../../index.php");
				}
					
				else {
					if(($_SESSION['ultima_chamada']) != null){
						$update = "UPDATE gerenciamento_painel SET status='Atendido' WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='C'";
						mysql_query($update) or die(mysql_error());
						
						$update100 = "UPDATE gerarsenha SET status='Atendido' WHERE numero_senha='".($var20012)."' AND tipo_senha='C'";
						mysql_query($update100) or die(mysql_error());
						
						$sql = "INSERT INTO gerenciamento_painel(senha_atual, status, usuario, tipo_senha, data, hora)";
						$sql .= " VALUES('".($var20012)."', 'Chamada', '".$_SESSION['guiche']."', 'C','$data','$hora')";
						mysql_query($sql) or die(mysql_error());
						
						$update11 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($var20012)."'";
						mysql_query($update11) or die(mysql_error());
						
						$_SESSION['status-at'] = "Chamada";
					}
						
					else{
						$sql3 = "INSERT INTO gerenciamento_painel(senha_atual, status, usuario, tipo_senha, data, hora)";
						$sql3 .= " VALUES('".($var20012)."', 'Chamada', '".$_SESSION['guiche']."', 'C', '$data','$hora')";
						mysql_query($sql3) or die(mysql_error());
						
						$update1012 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($var20012)."' AND tipo_senha='C'";
						mysql_query($update1012) or die(mysql_error());
						
						$update100 = "UPDATE gerarsenha SET status='Atendido' WHERE numero_senha='".($var20012)."' AND tipo_senha='C'";
						mysql_query($update100) or die(mysql_error());
						
						$update11 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($var20012)."'";
						mysql_query($update11) or die(mysql_error());
					}
					
					$_SESSION['ultima_chamada'] = ($var20012);
					
					$update = "UPDATE aux_painel SET aux='1'";
					mysql_query($update) or die(mysql_error());
					header("refresh:0; url=../refresh/cancela_alerta.php");
				}
			}
				
			else{
				$query1 = "SELECT senha_atual, status, prioridade, usuario, tipo_senha FROM gerenciamento_painel ORDER BY prioridade DESC LIMIT 1";
				$result1 = mysql_query($query1);
				while($row1 = mysql_fetch_array($result1)){
					$var = $row1['senha_atual'];
					$var2 = $row1['usuario'];
						$query = mysql_query("SELECT id, senha_atual, status, usuario, tipo_senha FROM gerenciamento_painel WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='C'");
						while($senha = mysql_fetch_array($query)){
							$ultima_senha = $senha['senha_atual'];
							
							$update44 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($_SESSION['ultima_chamada'])."'";
							mysql_query($update44) or die(mysql_error());
							
							$sql2 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($_SESSION['ultima_chamada'])."' AND tipo_senha='C'";
							mysql_query($sql2) or die(mysql_error());
							
							$update11 = "UPDATE gerenciamento_painel SET prioridade='1' WHERE senha_atual='".($_SESSION['ultima_chamada'])."'";
							mysql_query($update11) or die(mysql_error());
						}
								
						$update = "UPDATE aux_painel SET aux='1'";
						mysql_query($update) or die(mysql_error());
						header("refresh:0; url=../refresh/cancela_alerta.php");
				}
			}
		}
	}
?>

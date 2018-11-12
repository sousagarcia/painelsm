<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" dir="ltr" >
<head>
  <?php session_start(); error_reporting(0); header("refresh:4")?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Portal da Recepção | São Miguel Saúde</title>
  <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
  <link rel="stylesheet" href="template.css" type="text/css" />
  
<script type="text/javascript">
//desabilita menu de opcoes ao clicar no botao direito
function desabilitaMenu(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito
function desabilitaBotaoDireito(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
if (event.button == 2 || event.button == 3)
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito do mouse
if ( window.Event )
document.captureEvents(Event.MOUSEUP);
if ( document.layers )
document.captureEvents(Event.MOUSEDOWN);

document.oncontextmenu = desabilitaMenu;
document.onmousedown = desabilitaBotaoDireito;
document.onmouseup = desabilitaBotaoDireito;
</script>
</head>

<body id="minwidth-body"><?php if($_SESSION['status'] == 1){ ?>	
<div id="border-top" class="h_blue">
	
<style>
 #logo {
 position: absolute;
 top: 8px;
 left: 10px;
 }
</style>
	
	<div id="logo"><img src="images/logo.png" style="width:180px;" /></div>
	<br /><br /><br />
  
  <style>
   #pesquisa{
    position: absolute;
    top: 18px;
	right: 40px;
   }
   
   .senha{width:150px; height:45px; background:url('menu/icon-16-viewsite.png') no-repeat; background-position:3px;}
   .logout{width:90px; height:45px; background:url('menu/icon-16-logout.png') no-repeat; background-position:3px;}
  </style>
  
<div id="header-box">
<a href="#" onclick="window.open('updateSenha.php', 'Alterar Senha', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50%, LEFT=50%, WIDTH=1000, HEIGHT=500');">
<div class="senha" id="senha" style="position:absolute; top:10px; right:110px; cursor:pointer; border:1px solid #aaa; border-radius:10px;">
	<p style="margin-left:50px; margin-top:12px;">Alterar Senha</p>
</div>
</a>

<a href="logout.php" style="font-style:Arial; font-size:14px; color:#777; link-style:none;">
<div class="logout" id="logout" style="position:absolute; top:10px; right:10px; cursor:pointer; border:1px solid #aaa; border-radius:10px;">
	<p style="margin-left:50px; margin-top:12px;">Sair</p>
</div>
</a>
</div>

<section>
	<br />		

	<div style="position:absolute;">
		<?php echo"<h1><b style='font-weight:bold;'>Guichê 0".$_SESSION['guiche']."</b></h1>"; ?>
	</div>
	
	<div style="position:absolute; left:50%; margin-left:-200px;">
	<?php
			if($_SESSION['auxilia-prioritaria'] == 1){		
				$tipo = "Senha Preferencial";
			}
			
			else{
				$tipo = "Senha Comum";
			}
			
			echo"<h1><b style='font-weight:bold;'>Você está atendendo: </b>".($_SESSION['ultima_chamada'])." - ".$tipo."</h1>"; ?>
		
		</div>
		<div style="position:absolute; left:50%; margin-left:-200px; margin-top:35px;">
		
			
			
	</div>
	
	<div style="position:absolute; margin-top:35px;">
		<?php echo"<h1><b style='font-weight:bold;'>Status:</b> ".$_SESSION['status-at']."</h1>"; ?>
		
			
	</div>
	
	
	
	<div 
		style="position:absolute; margin-top:70px; left:50%; margin-left:-200px">
			<?php 
				//echo # preferenciais
				include 'abreConexao.php';
				
				
				
				$query5 = "SELECT preferencia FROM npreferencial WHERE id = 1";
					$result = mysql_query($query5);
				
						while($row = mysql_fetch_array($result)){
							$preferencia = $row['preferencia'];
						}				
				echo"<h1><b style='font-weight:bold;'>Senhas Preferenciais: </b> ".$preferencia."</h1>";
								
									
			?>
	</div>
	
	<div style="margin-top:100px;">
	<h1>Botões de Ação</h1>
		<a href="sql/insert/proximaSenha.php?valor=proxima"><input type="button" style="background:#EFEFEF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Próxima Senha" /></a>
		<a href="sql/insert/proximaSenha.php?valor=refresh"><input type="button" style="background:#EFEFEF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Chamar Novamente" /></a>
	</div>
	
	<br />
	<a href="sql/update/alteraPrioridade.php?value=comum"><input type="button" style="background:#EFEFEF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Chamar Senhas Comum" /></a>
	<a href="sql/update/alteraPrioridade.php?value=preferencial"><input type="button" style="background:#EFEFEF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Chamar Senhas Preferenciais" /></a>
			
	<div style="margin-top:30px;">
	<h1>Botões de Status</h1>
		<a href="sql/update/atualizaStatus.php?valor=atendido"><input type="button" style="background:#02C456; color:#FFF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Atendido" /></a>
		<a href="sql/update/atualizaStatus.php?valor=nao-atendido"><input type="button" style="background:#FC1C1C; color:#FFF; font-weight:bold; width:200px; height:80px; cursor:pointer;" value="Não Compareceu" /></a>
	</div>
</section>
<?php } else { header("location:../index.php");} ?></body>
</html>
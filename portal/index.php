<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Portal da Recepção | São Miguel Saúde</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="shortcut icon" type="image/png" href="login/favicon.ico"/>
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

<body>

	<div id="overHeader"></div>

	<div id="content">
		<div id="msgBox"></div>

		
<div id="header"><br />
	<div align="center"><img src="login/logo.png" width="400px"></div>
</div>

<div id="navigationBar">
	<div id="menubox">
	</div>
</div>

<br />
<table width="100%">
    <tr>
      <td align="center">
        <font class="TextoPadrao">
		 Para acessar, digite seu login e sua senha nos campos abaixo.
        </font>
      </td>
    </tr>
</table>

<form action="acessar.php" method="post">
<div align="center">
<br />
 <input type="text" name="login" method="post" size="40" placeholder="Digite seu login" /><br /><br />
 <input type="password" name="senha" method="post" size="40" placeholder="Digite sua senha" /><br /><br />
 <input type="submit" name="entrar" method="post" value="Acessar"/> <input type="reset" name="limpa" value="Limpar Campos"/>
</div>
</form>

<br />

	<div id="footer">
		<div id="footMsg" align="center">Orange Solutions</div>
		<div id="footCopyright" align="center">&copy; Todos os direitos reservados.</div>
	</div>
</body>
</html>

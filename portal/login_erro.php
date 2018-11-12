<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Portal da Recepção | São Miguel Saúde</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="shortcut icon" type="image/png" href="login/favicon.ico"/>
	
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
		<ul id="menu">
		</ul>
	</div>
</div>
<br />
<div class="message error" style="height:25px; line-height:25px;">
  <p>Erro ao logar-se no sistema.</p>
</div>

<form action="acessar.php" method="post">
<div align="center">
 <input type="text" name="login" size="40" placeholder="Digite seu login" /><br /><br />
 <input type="password" name="senha" size="40" placeholder="Digite sua senha" /><br /><br />
 <input type="submit" name="entrar" value="Acessar"/> <input type="reset" name="limpa" value="Limpar Campos"/>
</div>
</form>

<br />

	<div id="footer">
		<div id="footMsg" align="center">Orange Solutions</div>
		<div id="footCopyright" align="center">&copy; Todos os direitos reservados.</div>
	</div>
	</body>

</html>

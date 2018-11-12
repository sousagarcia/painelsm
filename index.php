<html>
<head>
<title>Painel de Senha | São Miguel Saúde</title>

<meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
<?php error_reporting(0); ?>
<link rel="shortcut icon" type="image/png" href="css/favicon.ico"/>
<link href="css/arquivo.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	/** Função Display (Senha e Guichê) **/
    $(document).ready(function(){
		var senha=0;

		document.getElementById("guiche").innerHTML="Guichê"; 	
		document.getElementById("senha").innerHTML="Senha";
	});
	
	/** Função Refresh **/
	function display_c(){
		var refresh = 1000;
		timer = setTimeout('display_ct()', refresh);
		passwd = setTimeout('display_senha()', refresh);
		mesa = setTimeout('display_guiche()', refresh);
		som = setTimeout('dispara_som()', refresh);
	}
	
	/** Função Display Senha **/
	function display_senha(){
		var display_passwd;
		$.ajax({
			url: 'session/getSenha.php',
			type: 'GET',
			success: function(res) {
				$("#cont_senha").html(res);
				display_passwd = $("#cont_senha").html(res);
			}
		});
	}
	
	/** Função Display Guichê **/
	function display_guiche(){
		$.ajax({
			url: 'session/getGuiche.php',
			type: 'GET',
			success: function(res) {
				$("#cont_guiche").html(res);
			}
		}); 
	}
	
	/** Função de Alerta **/
	function dispara_som(){
		var alerta;
		$.ajax({
			url: 'portal/sistema/sql/refresh/auxiliar.php',
			type: 'GET',
			success: function(res) {
				if(res == 1){
					document.getElementById('audio-alerta').play();
				}
				
				else{
					document.getElementById('audio-alerta').pause();
				}
			}
		});
	}
	
	/** Função Display Data e Hora **/
	function display_ct() {
		var strcount;
		var x = new Date();
		var x1 = ("0" + x.getHours()).substr(-2) + ":" + ("0" + x.getMinutes()).substr(-2) + ":" + ("0" + x.getSeconds()).substr(-2); 
		
		x1 = x1 + "<br />" + ("0" + x.getDate()).substr(-2) + "/" + ("0" + (x.getMonth() + 1)).slice(-2) + "/" + x.getFullYear();
		document.getElementById('data-hora').innerHTML = x1;
		
		tt = display_c();
	}
</script>

<style>
.back_g{
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 40%, #05abe0 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 40%,#05abe0 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 40%,#05abe0 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
</style>
</head>
<body onload="display_ct();" style="margin-top:50px; background:#ABDDED; overflow-x:hidden;">
	<!-- Topo -->
	<audio id="audio-alerta" src="sound/painel.mp3"></audio>
	
	<header>
		<div style="position:absolute; margin:5px 0px 0px -7px; background:#FFF; width:100%; height:90px;"></div>
			<img src="css/images/logo.png" alt="logo" style="position:absolute; left:50%; margin-left:-48%; margin-top:6px; width:290px;" />
		</div>
		
	<!-- Centro -->
	<section style="margin-top:-40px;">

	<div id="data-hora" style="position:absolute; color:#777; font-family:Calibri; font-size:35px; font-weight:bold; left:50%; margin-left:-28%; margin-top:203%; text-align:center;">
	</div>
		<div style="position:absolute; left:50%; margin-left:-560px; margin-top:-26px;">
			<div class="back_g" style="position:absolute; left:50%; margin-left:431px; margin-top:169px; border:7px solid #FFF; border-radius:20px; width:245px; height:190px;"></div>	
			<div id="senha" style="position:absolute; left:50%; margin-left:450px; margin-top:40px; font-family:Calibri; font-size:85px; color:#555;"></div>
			<div id="cont_senha" style="position:absolute; left:50%; margin-left:450px; margin-top:40px; font-family:Calibri; font-size:85px; color:#F00;"></div>
			
			
			<div class="back_g" style="position:absolute; left:50%; margin-left:431px; margin-top:390px; border:7px solid #FFF; border-radius:20px; width:245px; height:190px;"></div>	
			<div id="guiche" style="position:absolute; left:50%; margin-left:440px; margin-top:270px; font-family:Calibri; font-size:85px; color:#555;"></div>
			<div id="cont_guiche" style="position:absolute; left:50%; margin-left:525px; margin-top:260px; font-family:Calibri; font-size:85px; color:#F00;"></div>
		</div>
	</section>

	<!-- Rodapé -->
	
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Painel de Senha | São Miguel Saúde</title>
    <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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
			var x1 = ("0" + x.getHours()).substr(-2) + ":" + ("0" + x.getMinutes()).substr(-2) ;
					
			x1 = x1 + " &#09 " + ("0" + x.getDate()).substr(-2) + "/" + ("0" + (x.getMonth() + 1)).slice(-2) + "/" + x.getFullYear();
			//document.getElementById('data-hora').innerHTML = x1;
			
			tt = display_c();
		}
</script>


</head>

<body onload="display_ct();" scrolling="no" style="margin-top: 0;margin-bottom: 0;margin-left: 0;margin-right: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;min-width: 100%;background-color: #f5f5f5">
<audio id="audio-alerta" src="sound/painel.mp3"></audio>
<table class="main-wrapper" style="border-collapse: collapse;border-spacing: 0;display: table;table-layout: fixed; margin: 400px; -webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;text-rendering: optimizeLegibility;background-color: #f5f5f5; width: 100%;">
        <tbody>
            <tr>
                <td style="padding: 0;vertical-align: top" class="">
                    <div class="bottom-padding" style="margin-bottom: 0px; line-height: 0px; font-size: 30px;">&nbsp;</div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0;vertical-align: top; width: 100%;padding-top: 1%;" class="">
                    <center>
            
            <table class="main-content" style="width: 100%; max-width: 1500px border-collapse: separate;border-spacing: 0;margin-left: auto;margin-right: auto; border: 1px solid #EAEAEA; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; background-color: #ffffff; overflow: hidden;" width="1000">
                <tbody>
                    <tr>
                    <td style="padding: 0;vertical-align: top;">
                        <table class="main-content" style="border-collapse: collapse;border-spacing: 0;margin-left: auto;margin-right: auto;width: 100%; max-width: 1500px">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;vertical-align: top;text-align: left">
                                    <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td class="content-padding" style="padding: 0;vertical-align: top">
                                                <div style="margin-bottom: 0px; line-height: 0px; font-size: 30px;">&nbsp;</div>
                                                <div class="body-copy" style="margin: 0;">

                                                    <div style="margin: 0;color: #60666d;font-size: 50px;font-family: sans-serif;line-height: 20px; text-align: left;">
                                                        <div class="bottom-padding" style="margin-bottom: 0px; line-height: 15px; font-size: 15px;">&nbsp;</div>
														<section style="margin-top:-40px;">
														
														<iframe class="video" scrolling="no" src="https://tvaovivoonline.com/canais/bobo.php" frameborder="0" style="margin-top: 3%; overflow:hidden; height:600px; width:76%" allowfullscreen="" ></iframe>
															<!-- 
															http://portalzuca.com/canais/bobo.php
															https://tvaovivoonline.com/canais/bobo.php
															https://tvaovivoonline.com/canais/bobo1sp.php
															https://ekostreams.co/ch/bobo.php
															https://tvonlinegratis1.com/canalhd2.html 
															-->
														<div style="margin-left:40%; margin-top:2%;">																
															<div id="senha"></div>
															<div id="cont_senha"></div>
																		
															<div id="hr"><hr></div>
																
															<div id="guiche" ></div>
															<div id="cont_guiche" ></div>
														</div>
																										
                                                          
														                                                  
														<div class="bottom-padding" style="margin-bottom: 0px; line-height: 0; font-size: 7px; padding-top: 4%;">&nbsp;<br>
														<p id="data-hora" style="font-size:35px;  display: inline"></p> 
                                                                <img src="logo2SM.png" width="15%" style="margin-left: 40%;">
                                                                <img src="logoCS.png" width="11%" style="margin-left: 28%;">
                                                        </div>
                                                        <div style="width: 100%; text-align: center; float: left;">
                                                            
                                                        </div>
                                                        <div style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                                                    </div>
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    </tr>
                </tbody>
            </table>
                        
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>		
	
	

	

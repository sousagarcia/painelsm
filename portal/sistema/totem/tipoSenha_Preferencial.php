
<head>
   <link rel="stylesheet" type="text/css" href="css/stylesheet.css"> 
</head>

<script type="text/javascript">

     function wait(){
        setInterval(
            function goBack(){
             window.location = "loading.html"; 
         },500);
       
    };

   
    var clicks = 0;
    function printPass() {

        clicks += 1;
        if(clicks <= 1){
            window.print();
            printPass();
            wait();   
        }

    };  

    function timeOut(){

        setTimeout(
            function goBack(){
                window.location="index.html";
            },25000)
    };

    function passType(){
        window.location="tipoSenha.php";
    };
   
</script>

<?php
    session_start();
    //error_reporting(0);
    
    include 'abreConexao.php';
    
    if($_GET['valor'] == "prioritaria"){
        $result = mysql_query("SELECT COUNT(*) as total FROM gerarsenha WHERE tipo_senha='P'");
        $data = mysql_fetch_assoc($result);
        $aux = $data['total']+1;
        
        $sql = "INSERT INTO gerarsenha (tipo_senha, numero_senha)";
        $sql .= " VALUES('P', '$aux')";
        mysql_query($sql) or die(mysql_error());
        

        $texto = $aux;
        echo "<div  style='margin-left:20%' class='print'><img src onerror='printPass();'>";
        echo "<p style='font-size:21px; font-family:Arial;'>S&atilde;o Miguel Sa&uacute;de</p><br>";
        echo "<p style='font-size:45px; font-family:Arial; margin-top:-25px;'><span style='font-size:50px;'>Senha</span> <br />P".str_pad($aux, 4, '0', STR_PAD_LEFT)."</p>";
        echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>Por favor, nos avalie ap&oacute;s seu atendimento.</p><br>";
        echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>Sua opini&atilde;o &eacute; muito importante para n&oacute;s.</p><br>";
        echo "<p style='font-size:12px; font-family:Arial; margin-top:-22px;'>Para segunda via de boletos acesse nosso site:</p><br>";
        echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>www.saomiguelsaude.com.br</p>";
        echo "</div>";

            $_SESSION['ratingCount']++;
    }
     
   
    //Incrementa preferenciais.
                                        
            if($_GET['valor']== "prioritaria"){
                $update= "UPDATE npreferencial SET preferencia = preferencia + 1 WHERE id = 1";
                mysql_query($update) or die(mysql_error());
            
            }

    ?>
    
<html>
<head>
    <meta charset="utf-8">
 <style type="text/css">
     *[class=main-wrapper],
     *[class=main-content]{
            padding-top: 0;
        }
    *[class=bottom-padding]{
            margin-bottom: 0 !important;
        }
   
 </style>

</head>
<body style="margin-top: 0;margin-bottom: 0;margin-left: 0;margin-right: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;min-width: 100%;background-color: #f5f5f5" onload="timeOut();">
<table class="main-wrapper" style="border-collapse: collapse;border-spacing: 0;display: table;table-layout: fixed; margin: 0 auto; -webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;text-rendering: optimizeLegibility;background-color: #f5f5f5; width: 100%;">
        <tbody>
            <tr>
                <td style="padding: 0;vertical-align: top" class="">
                    <div class="bottom-padding" style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0;vertical-align: top; width: 100%;padding-top: 0" class="">
                    <center>
                      
                        <table class="main-content" style="width: 100%; max-width: 600px; border-collapse: separate;border-spacing: 0;margin-left: auto;margin-right: auto; border: 1px solid #EAEAEA; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; background-color: #fafafa; overflow: hidden;" width="600">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;vertical-align: top;">
                                        <table class="main-content" style="border-collapse: collapse;border-spacing: 0;margin-left: auto;margin-right: auto;width: 100%; max-width: 1000px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;vertical-align: top;text-align: left">
                                                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="content-padding" style="padding: 0;vertical-align: top">
                                                                        <div style="margin-bottom: 0px; line-height: 20px; font-size: 30px;">&nbsp;</div>
                                                                        <div class="body-copy" style="margin: 0;">

                                                                            <div style="margin: 0;color: #60666d;font-size: 50px;font-family: sans-serif;line-height: 20px; text-align: left;">
                                                                                
                                                                                <div class="bottom-padding" style="margin-bottom: 0px; line-height: 10px; font-size: 15px;">&nbsp;</div>
                                                                               
                                                                                <div style="text-align: center; margin: 0; font-size: 21px;  letter-spacing: .8px;">   
                                                                                    <p align="left" style="padding-left:10%">- Pessoas acima de 60 anos<br><br>

                                                                                            - Gestantes<br><br>

                                                                                            - Portadores de Deficiência Física<br><br>

                                                                                            - Pessoas acompanhadas por crianças de colo<br><br>



                                                                                            Para o atendimento PREFERENCIAL será necessário <br> apresentar o RG no momento do atendimento.<br><br>



                                                                                            Lei Municipal nº: 11248 de 01/10/1992.
                                                                                        </div>
                                                                                        </p>
                                                                                        
                                                                                <hr style="color: #D3D3D3" width="80%">

                                                                               
                                                                                <a href='tipoSenha_Preferencial.php?valor=prioritaria' >
                                                                                  <button class='button button4 hover' id='senha-prioritaria' style='padding: 33px 110px;margin-left: 21%;margin-top: 0; font-family:sans-serif; font-size:27px; letter-spacing: .7px;'>Aceitar e Imprimir</button>
                                                                                </a>
                                                                                
                                                                                  <button onclick="passType();" class='button button5 hover' id='senha-prioritaria' style='padding: 25px 189px;margin-left: 21%;margin-top: 0; font-family:sans-serif; font-size:26px; letter-spacing: .7px;'>Voltar</button>
                                                                                                                                                                    
                                                                                    
                                                                                    <br>
                                                                                    <br>
                                                                                    
                                                                                <div class="bottom-padding" style="margin-bottom: 0px;margin-left: 41%; line-height: 0; font-size: 7px; padding-top: 0;">&nbsp;<br>
                                                                                        <img src="logo2SM.png" width="35%">
                                                                                         <img src="logoCS.png" width="20%" style="padding-left: 40%">
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
    
    

<?php
error_reporting(0);
session_start();
require 'DBConnect.php';

$nota = $_GET['rating'];
$departamento = $_GET['dpt'];
$passCnt= $_SESSION['ratingCount'];

if(getenv('HTTP_X_FORWARDED_FOR')){
$ip = getenv('HTTP_X_FORWARDED_FOR');
}elseif(getenv('HTTP_CLIENT_IP')){
$ip = getenv('HTTP_CLIENT_IP');
}else{
$ip = getenv('REMOTE_ADDR');
}

if ($passCnt > 0) {
    $insert = "INSERT INTO avaliacao_sms (IP, NOTA, DEPARTAMENTO) VALUES ('$ip', $nota, $departamento )";
mysql_query($insert);

$_SESSION['ratingCount']--;
}



#http://localhost/Avaliacao/avaliacao.php?rating=3&dpt=%27social%27&ip=%272.2.2.2%27 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
     <style>



</style>
  <style type="text/css">
/* Star hover using lang hack in its own style wrapper, otherwise Gmail will strip it out */
    * [lang~="x-star-wrapper"]:hover *[lang~="x-star-number"]{
        color: #119da2 !important;
        border-color: #119da2 !important;
    }

    * [lang~="x-star-wrapper"]:hover *[lang~="x-full-star"],
    * [lang~="x-star-wrapper"]:hover ~ *[lang~="x-star-wrapper"] *[lang~="x-full-star"] {
      display : block !important;
      width : auto !important;
      overflow : visible !important;
      float : none !important;
      margin-top: -1px !important;
    }

    * [lang~="x-star-wrapper"]:hover *[lang~="x-empty-star"],
    * [lang~="x-star-wrapper"]:hover ~ *[lang~="x-star-wrapper"] *[lang~="x-empty-star"] {
      display : block !important;
      width : 0 !important;
      overflow : hidden !important;
      float : left !important;
      height: 0 !important;
    }
</style>


<style type="text/css">
/* Normal email CSS */
    @-ms-viewport {
        width: device-width;
    }
    body {
        margin: 0;
        padding: 0;
        min-width: 100%;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    td {
        vertical-align: top;
    }
    img {
        border: 0;
        -ms-interpolation-mode: bicubic;
        max-width: 100% !important;
        height: auto;
    }
    a {
        text-decoration: none;
        color: #119da2;
    }
    a:hover {
        text-decoration: underline;
    }

    *[class=main-wrapper],
    *[class=main-content]{
        min-width: 0 !important;
        width: 800px !important;
        margin: 0 auto !important;
    }
    *[class=rating] {
      unicode-bidi: bidi-override;
      direction: rtl;
    }
    *[class=rating] > *[class=star] {
      display: inline-block;
      position: relative;
      text-decoration: none;
    }

    @media (max-width: 621px) {
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -o-box-sizing: border-box;
        }
        table {
            min-width: 0 !important;
            width: 100% !important;
        }
        *[class=body-copy] {
            padding: 0 10px !important;
        }
        *[class=main-wrapper],
        *[class=main-content]{
            min-width: 0 !important;
            width: 320px !important;
            margin: 0 auto !important;
        }
        *[class=ms-sixhundred-table] {
            width: 100% !important;
            display: block !important;
            float: left !important;
            clear: both !important;
        }
        *[class=content-padding] {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
        *[class=bottom-padding]{
            margin-bottom: 15px !important;
            font-size: 0 !important;
            line-height: 0 !important;
        }
        *[class=top-padding] {
            display: none !important;
        }
        *[class=hide-mobile] {
            display: none !important;
        }
        

        /* Prevent hover effects so double click issue doesn't happen on mobile devices */
        * [lang~="x-star-wrapper"]:hover *[lang~="x-star-number"]{
            color: #AEAEAE !important;
            border-color: #FFFFFF !important;
        }
        * [lang~="x-star-wrapper"]{
            pointer-events: none !important;
        }
        * [lang~="x-star-divbox"]{
            pointer-events: auto !important;
        }
        *[class=rating] *[class="star-wrapper"] a div:nth-child(2),
        *[class=rating] *[class="star-wrapper"]:hover a div:nth-child(2),
        *[class=rating] *[class="star-wrapper"] ~ *[class="star-wrapper"] a div:nth-child(2){
          display : none !important;
          width : 0 !important;
          height: 0 !important;
          overflow : hidden !important;
          float : left !important;
        }
        *[class=rating] *[class="star-wrapper"] a div:nth-child(1),
        *[class=rating] *[class="star-wrapper"]:hover a div:nth-child(1),
        *[class=rating] *[class="star-wrapper"] ~ *[class="star-wrapper"] a div:nth-child(1){
          display : block !important;
          width : auto !important;
          overflow : visible !important;
          float : none !important;
        }
    }

    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
</style>
</head>
<body style="margin-top: 0;margin-bottom: 0;margin-left: 0;margin-right: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;min-width: 100%;background-color: #f5f5f5">
<table class="main-wrapper" style="border-collapse: collapse;border-spacing: 0;display: table;table-layout: fixed; margin: 0 auto; -webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;text-rendering: optimizeLegibility;background-color: #f5f5f5; width: 100%;">
        <tbody>
            <tr>
                <td style="padding: 0;vertical-align: top" class="">
                    <div class="bottom-padding" style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0;vertical-align: top; width: 100%;padding-top: 25%;" class="">
                    <center>
                        <!--[if gte mso 11]>
 <center>
 <table><tr><td class="ms-sixhundred-table" width="600">
<![endif]-->

                        <table class="main-content" style="width: 100%; max-width: 600px; border-collapse: separate;border-spacing: 0;margin-left: auto;margin-right: auto; border: 1px solid #EAEAEA; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; background-color: #ffffff; overflow: hidden;" width="600">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;vertical-align: top;">
                                        <table class="main-content" style="border-collapse: collapse;border-spacing: 0;margin-left: auto;margin-right: auto;width: 100%; max-width: 600px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;vertical-align: top;text-align: left">
                                                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="content-padding" style="padding: 0;vertical-align: top">
                                                                        <div style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                                                                        <div class="body-copy" style="margin: 0;">

                                                                            <div style="margin: 0;color: #60666d;font-size: 50px;font-family: sans-serif;line-height: 20px; text-align: left;">
                                                                                <div class="bottom-padding" style="margin-bottom: 0px; line-height: 15px; font-size: 15px;">&nbsp;</div>
                                                                                <div style="text-align: center; margin: 0; font-size: 25px;  text-transform: uppercase; letter-spacing: .5px;">Obrigado por nos avaliar!</div><br>
                                                                                
                                                                                <div class="bottom-padding" style="margin-bottom: 0px;margin-left: 42%; line-height: 10px; font-size: 7px;">&nbsp;<br>
                                                                                		<img src="logo2SM.png" width="35%">
                                                                                        <img src="logoCS.png" width="20%" style="padding-left: 40%">
                                                                                </div>
                                                                                <div style="width: 100%; text-align: center; float: left;">
                                                                                    
                                                                                </div>
                                                                                <div style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                                                                            </div>
                                                                             

                                                                                <script>
                                                                                setInterval(
                                                                                    function goBack() {
                                                                                       window.location = "index.html";
                                                                                    },1600);
                                                                                </script>

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
                        <!--[if gte mso 11]>
 </td></tr></table>
 </center>
<![endif]-->
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
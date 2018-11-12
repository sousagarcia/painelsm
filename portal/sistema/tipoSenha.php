<style>

.print{
	display: none;
	-moz-appearance: none;
}

@media print {
    #imprime-senha {
        display:none;
    }
	#senha-comum {
        display:none;
    }
	#senha-prioritaria {
        display:none;
    }

 .print{
	display: block;
	-moz-appearance: block; 
}
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 30px 60px;
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

<script type="text/javascript">
    var clicks = 0;
    function onClick() {
        clicks += 1;
		if(clicks <= 1){
			window.print();
			onClick();
		}
		
		//else{
		//	alert("Esta senha já foi impressa");
		//}
    };
</script>

<?php
	session_start();
	error_reporting(0);
	
	include 'abreConexao.php';
	
	if($_GET['valor'] == "prioritaria"){
		$result = mysql_query("SELECT COUNT(*) as total FROM gerarsenha WHERE tipo_senha='P'");
		$data = mysql_fetch_assoc($result);
		$aux = $data['total']+1;
		
		$sql = "INSERT INTO gerarsenha (tipo_senha, numero_senha)";
		$sql .= " VALUES('P', '$aux')";
		mysql_query($sql) or die(mysql_error());
		
		$texto = $aux;
		echo "<div class='print'>";
		echo "<p style='font-size:18px; font-family:Arial;'>S&atilde;o Miguel Sa&uacute;de</p>";
		echo "<p style='font-size:30px; font-family:Arial; margin-top:-25px;'><span style='font-size:20px;'>Senha</span> <br />P".str_pad($aux, 4, '0', STR_PAD_LEFT)."</p>";
		echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>Para segunda via de boletos acesse nosso site: www.saomiguelsaude.com.br</p>";
		echo "</div>";
	}
	 
	else if($_GET['valor'] == "comum"){
		$result = mysql_query("SELECT COUNT(*) as total FROM gerarsenha WHERE tipo_senha='C'");
		$data = mysql_fetch_assoc($result);
		$aux = $data['total']+1;
		
		$sql = "INSERT INTO gerarsenha (tipo_senha, numero_senha)";
		$sql .= " VALUES('C', '$aux')";
		mysql_query($sql) or die(mysql_error());
	
		$texto = $aux;
		echo "<div class='print'>";
		echo "<p style='font-size:18px; font-family:Arial;'>S&atilde;o Miguel Sa&uacute;de</p>";
		echo "<p style='font-size:30px; font-family:Arial; margin-top:-25px;'><span style='font-size:20px;'>Senha</span> <br />C".str_pad($aux, 4, '0', STR_PAD_LEFT)."</p>";
		echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>Para segunda via de boletos acesse nosso site: www.saomiguelsaude.com.br</p>";
		echo "</div>";
	}
	//Incrementa preferenciais.
										
					if($_GET['valor']== "prioritaria"){
						$update= "UPDATE npreferencial SET preferencia = preferencia + 1 WHERE id = 1";
						mysql_query($update) or die(mysql_error());
					
					}
	
	echo "<a href='tipoSenha.php?valor=comum' onclick='onClick()';><button class='button button2' id='senha-comum' style='margin-left: 40%;margin-top: 10%; font-family:Arial; font-size:19px;'>Senha Comum</button></a>";

	echo "<a href='tipoSenha.php?valor=prioritaria' onclick='onClick()';><button class='button button4' id='senha-prioritaria' style='margin-left: 40%;margin-top: 5%; font-family:Arial; font-size:19px;'>Senha Priorit&aacute;ria</button></a>";

	//echo "<a href='#' onclick='onClick();'><p id='imprime-senha' style='margin-left: 45%;font-family:Arial; font-size:14px;'>Imprimir Senha</p></a>";
?>
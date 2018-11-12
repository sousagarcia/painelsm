<style>
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
}
</style>

<?php
	session_start();
	error_reporting(0);
	
	include 'abreConexao.php';
	
	if($_GET['valor'] == "prioritaria"){
		$result = mysql_query("SELECT COUNT(*) as total FROM gerenciamento_painel WHERE tipo_senha='P'");
		$data = mysql_fetch_assoc($result);
		$aux = $data['total']+1;
		
		$sql = "INSERT INTO gerenciamento_painel (tipo_senha, senha_atual)";
		$sql .= " VALUES('P', '$aux')";
		mysql_query($sql) or die(mysql_error());
		
		$texto = $aux;
		
		echo "<p style='font-size:18px;'>São Miguel Saúde</p>";
		echo "<p style='font-size:30px; margin-top:-25px;'><span style='font-size:20px;'>Senha</span> <br />P".str_pad($aux, 4, '0', STR_PAD_LEFT)."</p>";
		echo "<p style='font-size:12px; margin-top:-25px;'>Para segunda via de boletos acesse nosso site: www.saomiguelsaude.com.br</p>";
	}
	
	else if($_GET['valor'] == "comum"){
		$result = mysql_query("SELECT COUNT(*) as total FROM gerenciamento_painel WHERE tipo_senha='C'");
		$data = mysql_fetch_assoc($result);
		$aux = $data['total']+1;
		
		$sql = "INSERT INTO gerenciamento_painel (tipo_senha, senha_atual)";
		$sql .= " VALUES('C', '$aux')";
		mysql_query($sql) or die(mysql_error());
	
		$texto = $aux;
		echo "<p style='font-size:18px; font-family:Arial;'>São Miguel Saúde</p>";
		echo "<p style='font-size:30px; font-family:Arial; margin-top:-25px;'><span style='font-size:20px;'>Senha</span> <br />C".str_pad($aux, 4, '0', STR_PAD_LEFT)."</p>";
		echo "<p style='font-size:12px; font-family:Arial; margin-top:-25px;'>Para segunda via de boletos acesse nosso site: www.saomiguelsaude.com.br</p>";
	}
	
	echo "<a href='tipoSenha.php?valor=prioritaria'><p id='senha-prioritaria' style='font-family:Arial; font-size:14px;'>Gerar Senha Prioritária</p></a>";
	echo "<a href='tipoSenha.php?valor=comum'><p id='senha-comum' style='font-family:Arial; font-size:14px;'>Gerar Senha Comum</p></a>";
	echo "<a href='#' onclick='window.print();'><p id='imprime-senha' style='font-family:Arial; font-size:14px;'>Imprimir Senha</p></a>";
?>
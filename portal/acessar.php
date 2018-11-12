<?php
session_start();

$emailUsuario = $_POST['login'];
$senhaUsuario = $_POST['senha'];

$_SESSION['login'] = $emailUsuario;
$_SESSION['senha'] = $senhaUsuario;
$_SESSION['prioritaria'] = 0;
$_SESSION['auxilia-prioritaria'] = 0;

	
	
	$con = mysql_connect("localhost","root","") or print (mysql_error());
	mysql_select_db("atendimento", $con) or print(mysql_error());
	
	
//verificando dados no BD - SELECT
$rsUsuario = mysql_query("Select * from cadastro_usuario where login like '$emailUsuario' and senha like '$senhaUsuario'", $con);

if(mysql_num_rows($rsUsuario)>0){
      //Login com sucesso
      $tblUsuario = mysql_fetch_array($rsUsuario) or die (mysql_error());
	  date_default_timezone_set('America/Sao_Paulo');
	  
	  
	  $data_aux = date("d-m-Y");
	  $data = date("Y-m-d", strtotime($data_aux));
	  $hora = date('H:i:s');
	  
	  $usuario = $tblUsuario['nome_usuario'];
	  $id_usuario = $tblUsuario['id'];
	  
	  $_SESSION['id_login'] = $id_usuario;
	  $_SESSION['guiche'] = $tblUsuario['mesa'];
	  
	  $sql = "INSERT INTO logs_acesso (login, usuario, dt, hora, info, id_usuario)";
	  $sql .= " VALUES('$emailUsuario', '$usuario', '$data', '$hora', 'Logado', $id_usuario)";
	  mysql_query($sql, $con) or die(mysql_error());
	  
	  $update = "UPDATE cadastro_usuario SET tipo_atendimento='C' WHERE login='".$emailUsuario."'";
	  mysql_query($update, $con) or die(mysql_error());
	  
	  if ($emailUsuario == "guiche05") {
	  	header("location:sistema/relatorio.html");
	  }

	   else if($tblUsuario['perfil'] == 'Administrador'){
	    $_SESSION['status'] = 1;
		header("location:sistema/");
	  }
	  
	  else if($tblUsuario['perfil'] == 'Operador'){
	    $_SESSION['status'] = 2;
		header("location:sistema/tipoSenha.php");
	  }
	  
	  
	  $_SESSION['usuario'] = $emailUsuario;
	  $_SESSION['ip'] = getenv("REMOTE_ADDR");
	  $_SESSION['nome'] = $tblUsuario['nome_usuario'];
	  $_SESSION['setor'] = $tblUsuario['setor'];
	  $_SESSION['perfil'] = $tblUsuario['perfil'];
	  $_SESSION['ramal'] = $tblUsuario['ramal'];
} else{
	  //redirecionando
      print '<script type="text/javascript">window.top.location.href = "'. "login_erro.php" .'";</script>';
	  exit(0);
}



?>
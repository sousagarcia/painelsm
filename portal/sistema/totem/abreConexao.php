<?php
	/************ Banco Nuvem ************/
	/*
	error_reporting(0);
	$con = mysql_connect("painelsm84.mysql.uhserver.com","painelsm","orange2409@") or print (mysql_error());
	mysql_select_db("painelsm84", $con) or print(mysql_error());
	*/
	
	/************ Banco Local ************/
	error_reporting(0);
	$con = mysql_connect("localhost","root","") or print (mysql_error());
	mysql_select_db("atendimento", $con) or print(mysql_error());
?>
<?php   //Conexao_Banco.php
	$servername = "localhost"; // servidor
	$username = "root";        // usuario
	$password = "usbw";        // senha
	$dbname = "teste_cadastro_banco";        // banco de dados
	//--------------------------------------------------                
	$connect = mysql_connect($servername, $username, $password) or print (mysql_error());
	//---------------------------------------------------
	mysql_select_db($dbname, $connect);
?>
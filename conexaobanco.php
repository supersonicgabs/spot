<?php

$host = "191.252.138.46";
$user = "jurandir_spot2";
$pass = "Gabera+10";
$banco = "jurandir_spot2";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());

//Criar a conexão
//$conn = mysqli_connect($host, $user, $pass, $banco);

	if(!$conn)
	{
		die("Falha na Conexão: " . mysql_error());
	}
	else
	{
		//echo "Conexão realizada com sucesso";
	}
?>

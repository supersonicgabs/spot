<?php 
	include 'Conexao_Banco.php';
	if (!$connect) 
	{
		die("Conexão Falhou!!: " . mysql_connect_error());
	}
	//Executa uma consulta no dbJAVA!! 	
	$sql = "select max(cd_usuario)+1 coduser from tb_usuario";
	$result = mysql_query($sql,$connect);
	$row = mysql_fetch_assoc($result);
	$usuario = $row["coduser"];
	
	$sql = "insert into tb_usuario(cd_usuario,nm_usuario,ds_email) values ";
	$sql = $sql . "(".$usuario.",'".$_POST["usuario"]."','".$_POST["email"]."') ";
	$result = mysql_query($sql);
	//Fim da Consulta

	mysql_close($connect);
?>
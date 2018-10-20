<?php
session_start();	
	//Incluindo a conexão com banco de dados
	
include_once("conexaobanco.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$criptografia = hash(md5, $senha);


$sql = mysql_query("SELECT * FROM tb_usuario WHERE nome = '$nome' AND senha = '$criptografia'");
$dados = mysql_query("SELECT nome, senha FROM tb_usuario WHERE nome = '$nome'");
// $result = mysql_fetch_array($dados);
$result = mysql_fetch_assoc($sql);
//$row = mysql_num_rows($sql);

// if($email == $result['email'] AND $senha == $result['senha']){

// }

//if(mysql_affected_rows() > 0){
if ($result) {
	
	//echo "<script>loginfailed()</script>";
	$_SESSION['nome'] = $nome;
	$_SESSION['senha'] = $senha;
	echo '<script type="text/javascript">'; 
    echo  "alert('Voce foi logado com sucesso!');";
	echo 'window.location.href = "default.php";';
    echo '</script>';          
} else {
	unset($_SESSION['nome']);
	unset($_SESSION['senha']);
	echo '<script type="text/javascript">'; 
    echo  "alert('Usuario ou senha invalidos!');";
	echo 'window.location.href = "index.html";';
    echo '</script>'; 
}
	
?>

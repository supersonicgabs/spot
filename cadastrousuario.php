<?php

    session_start();
    include_once("conexaobanco.php");

    		//if (isset ($_POST['cadastro_usuario']) && $_POST[cadastro_usuario] == 'usuario'){
    			$nome 			= $_POST['nome'];
    			$cpf 			= $_POST['cpf'];
    			$email 			= $_POST['email'];
    			$conf_email 	= $_POST['conf_email'];
    			$celular		= $_POST['celular'];
    			$senha 			= $_POST['senha'];
    			$cripto			= md5($senha);

    // 			if(stristr($email, "@")) {
    // 				echo "O E-mail é válido!";
				// } else {
    // 				echo "O E-mail é inválido!";
    // 			}

                if($_POST['email'] != $_POST['conf_email']){

                    //echo "Os e-mails não conferem";
                    echo  "<script>alert('Os e-mails nao conferem!');</script>";

                }elseif($_POST['senha'] != $_POST['conf_senha']){

    				//echo "as senhas não conferem!";
                    echo  "<script>alert('As senhas nao conferem!');</script>";
                    
    			}else{
    				//$cad_usuario = "INSERT INTO tb_usuario (null, nome, cpf, email, conf_email, telefone, celular, senha, conf_senha)
    								//VALUES (null, '$nome', '$cpf', '$email', '$conf_email', '$telefone', '$celular', '$encript', '$cripto')";
                    //sha1('$senha')

                    $cad_usuario = "INSERT INTO tb_usuario (nome, cpf, email, celular, senha) VALUES ('$nome', '$cpf', '$email', '$celular', '$cripto')";
    			}

    			//$res_cad = mysql_query($cad_usuario)
                $resultado_cad = mysql_query($cad_usuario);

    			//if(mysql_affected_rows($conn) <= '0')
                if(mysql_affected_rows() <= 0)
                {
    				//echo "Erro ao cadastrar o usuário!";                    
                    echo '<script type="text/javascript">'; 
                    echo  "alert('Erro ao cadastrar o usuario!');";
                    echo 'window.location.href = "cadastro_usuario.php";';
                    echo '</script>';                     

    			}
                else
                {

                    echo '<script type="text/javascript">'; 
                    echo  "alert('Usuario cadastrado com sucesso!');";
                    echo 'window.location.href = "index.html";';
                    echo '</script>';                              
                }
    		//}

   //header("Location: index.php");

 	?>	

    
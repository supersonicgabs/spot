<html> 
    <link rel="stylesheet" type="text/css" href="css/trabalho.css" />
        <head>
            <meta charset="utf8" />
            <title>
                Consulta de Usuario
            </title>        
        </head>
        
        <body>
            <?php
                        require 'Conexao_Banco.php'; //include 'includes/Conexao_Banco.php';
                       
						
                        if($connect) {
                               
                                $sql = "select * from tb_usuario";
                                
                               $result =  mysql_query($sql,$connect);
                               echo "<table id='dados-usuario'>" .
                                    "<tr>" .
                                        "<td>" .
                                            "#" .
                                        "</td>" .
                                        "<td>" .
                                            "Nome" .
                                        "</td>" .
                                        "<td>" .
                                            "Email" .
                                        "</td>" .
                                        "<td>" .
                                            "Apelido" .
                                        "</td>" .
                                    "</tr>";
                                        
                                        
                                while($linha = mysql_fetch_array($result)) {
                                    // Escreve o valor da coluna cd_pais (que está no array $linha)
                                                                      
                                echo "<tr>" .
                                        "<td>" .
                                            $linha["cd_usuario"] .
                                        "</td>" .
                                        "<td>" .
                                            $linha['nm_usuario'] .
                                        "</td>" .
                                        "<td>" .
                                            $linha['ds_email'] .
                                        "</td>" .
                                    "</tr>";
                                    
                                }
                                
                                echo "</table>";    
                            

                                
//                                 if($sem_erros){
//                                     //Exibir mensagem de sucesso
//                                     echo("<br>"."Exibir mensagem de sucesso");
//                                 
//                                 }else {
//                                     //Exibir mensagem de erro
//                                     echo("<br>"."Exibir mensagem de erro");
// 
//                                 }
                            
                       }
                ?>
            
        </body>
</html>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

    include_once("conexaobanco.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php  
//esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
session_start();


if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    // header('location:index.html');
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "index.html";';
    echo '</script>'; 
}



$logado = $_SESSION['nome'];
//$nome = $_POST['nome'];

$sql = "SELECT * FROM tb_usuario where nome = '$logado'";
$resultado = mysql_query($sql, $conn);
$email = mysql_result($resultado, 0, 'email');
$celular = mysql_result($resultado, 0, 'celular');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" /> 
    <title>SPOT</title>
      <link href="Arquitetura/Imagens/Icones/icone.ico" rel="shortcut icon" type="image/x-icon" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="index,follow" />
        <meta name="description" content="[[*introtext]]" />
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA0UFE4cbyTQ7hUgsOatsdU4q65a0KdNEw&sensor=false"></script>     
    <link href="Arquitetura/CSS/Reset.css" rel="stylesheet" />
    <link href="Arquitetura/CSS/EstilosMaster.css" rel="stylesheet" />
    <link href="Arquitetura/CSS/EstilosGeral.css" rel="stylesheet" />
    <link href="Arquitetura/CSS/Menu-Mobile.css" rel="stylesheet" />
<style>
html
{
    /*background-image: url('Arquitetura/Imagens/Layout/wallpaper-wn.jpg');
    background-attachment:fixed;*/        
}

body
{
    background-color: rgba(23, 21, 32, 0.9);    
}
        

            .center { width:1000px; text-align: center;  margin: 0 auto; } 
            .clear {float: none; clear:both;}

.conteudo
{
    z-index: 99;
    position: absolute;
    width: 100%;
    margin-top: 100vh;    
}            
</style>
</head>
<body id="body">
        <header>
            <div class="container">
                <div class="col col-4">
                        <div class="btn-menu no-desktop" onclick="AbrirMenu('menu-mobile-area')">
                            <button class="c-hamburger c-hamburger--htx">
                                <span>toggle menu</span>
                            </button>
                        </div>                
                    <div class="logo"><a href="default.php"><img src="Arquitetura/Imagens/Layout/logo-principal.png" alt="Spot" title="Spot" /></a></div>
                </div>
                <div class="col col-8">
                    <nav class="no-mobile">
                        <ul>
                        <li><a href="Default.php">Home</a></li>
                            <li><a href="sobre.php">Sobre</a></li>
                            <li><a href="#">contato</a></li>
                            <li><a href="index.html"><?php session_destroy(); ?> Sair</a>                               
                            </li>                           
                        </ul>                       
                    </nav>
                </div>                
            </div>                      
        </header>        
            <div class="menu-mobile-area" id="menu-mobile-area">
                <div class="container">
                <p class="primeiro-item-menu">Bem Vindo,<br> <?php echo" $logado"; ?></p>
                            <a href="Default.html" title="Home">
                                    <p class="item-menu"><img src="Arquitetura/Imagens/Icones/home.svg" />Home</p>
                            </a>
                            <a href="Sobre.html" title="Sobre">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/sobre.svg" />Sobre
                                </p>
                            </a>                         
                            <a href="Contato.html" title="Contato">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/contato.svg" />Contato
                                </p>
                            </a>
                            <a onclick="abrirLista()">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/contato.svg" />Lista de Vagas
                                </p>
                            </a>                            
                            <a href="index.html" title="Sair">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/sair.svg" />Sair
                                </p>
                            </a>
                </div>
            </div>
        </div>
        <div class="banner-principal">
            <div class="texto-area">
                <p class="titulo">
                    Aluguel de vagas rápido e prático!                    
                </p>
                <p class="texto">
                Cansou de procurar vagas pra estacionar o seu carro quando vai sair pra algum lugar?<br />
                    Com o nosso serviço, você aluga uma vaga adequada para o seu carro de uma pessoa que não usa.
                </p>
            </div>
        </div>          
        <section class="conteudo" onclick="FecharMenu();">        
    <section class="quem-somos">
        <div class="container-menor">
            <div class="col col-12">
                <ul>
                    <li class="cards-quem-somos animated">
                        <div class="titulo-area">
                            <p>O que fazemos?</p>
                            <img src="Arquitetura/Imagens/Icones/o-que-fazemos.svg" />
                        </div>
                        <div class="clear"></div>
                        <div class="texto-area">
                            <p>
                                Somos uma empresa preocupada com o seu lugar.
                                <br />
                                <br />
                                Mostramos pra você as casas que estão com as vagas disponíveis perto de onde você pretende ir.                                
                                <br />
                            </p>
                        </div>
                    </li>
                    <li class="cards-quem-somos animated">
                        <div class="titulo-area">
                            <p>Como fazer?</p>
                            <img src="Arquitetura/Imagens/Icones/como-fazer.svg" />                            
                        </div>
                        <div class="clear"></div>
                        <div class="texto-area">
                            <p>
                                <b>I</b> - Faça seu cadastro
                                <br />
                                <br />
                                <b>II</b> - Localize a vaga mais perto do seu destino
                                <br />
                                <br />
                                <b>III</b> - Clique no marcador do mapa
                                <br />
                                <br />
                                <b>IV</b> - Contate o proprietário
                                <br />
                                <br />
                                <b>V</b> - Alugue a vaga!
                                <br />
                                <br /> 
                            </p>
                        </div>
                    </li>
                    <li class="cards-quem-somos animated">
                        <div class="titulo-area">
                            <p>Cadastre sua vaga</p>
                            <img src="Arquitetura/Imagens/Icones/cadastre-vaga.svg" />
                        </div>
                        <div class="clear"></div>
                        <div class="texto-area">
                            <p>
                                Você também pode disponibilizar sua vaga para aluguel!
                                <br /><br />
                                Cadastre o local da sua vaga preenchendo um rápido formulário, assim o usuário poderá entrar em contato com você através: 
                                <br />
                                <br />
                                 <b>&bull;</b> Do seu e-mail
                                 <br />
                                 <b>&bull;</b> Do seu Whatsapp
                                 <br />
                                 <br />
                                 <br />
                            </p>
                        </div>
                    </li>
                    <li class="cards-quem-somos animated">
                        <div class="titulo-area">
                            <p>Dúvidas?</p>
                            <img src="Arquitetura/Imagens/Icones/duvidas.svg" />
                        </div>
                        <div class="clear"></div>
                        <div class="texto-area">
                            <p>
                                Se tiver alguma dúvida sobre como o serviço funcione, alguma reclamação, e/ou até uma sugestão, por favor, <a href="#">entre em contato conosco</a>
                                <br />
                                <br />
                                <a href="#">Basta preencher um rápido formulário</a> com a suas informações básicas que responderemos o mais rápido possível! :)
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>    
    </section>
        
        </section>
        <footer>
        </footer>               
        <script src="Arquitetura/jQuery/Waypoints/jquery.waypoints.min.js"></script>
        <link href="Arquitetura/jQuery/Waypoints/animate.css" rel="stylesheet" />
        <script src="Arquitetura/jQuery/jquery-ui.min.js"></script>
    <script src="Arquitetura/jQuery/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <link href="Arquitetura/jQuery/Magnific-Popup/magnific-popup.css" rel="stylesheet" />
	<script src="Arquitetura/Javascript/Master.js"></script>	
    <script src="Arquitetura/Javascript/Menu.js"></script>
</body>
</html>


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
    <style>
    body
    {
        background-color:#151515;
    }
    </style>
<style>
.portfolio
{
    z-index: 2;
    position: relative;    
    width: 100%;
    float: left;
}


            input.error{
                border:solid 1px red;
            }
            label { font-size: large; display: block; }
            ul { list-style: none; }
            li { text-align: right; padding-right:1em; padding-bottom: .5em; }    
            .center { width:1000px; text-align: center;  margin: 0 auto; } 
            .clear {float: none; clear:both;}
</style>
</head>
<body>         

        <div id="cadastro-usuario">
    <section class="cadastro-usuario">
    <div class="container">
        <div class="col col-12">
        <img src="Arquitetura/Imagens/Layout/logo-principal.png" alt="Spot" title="Spot" class="logo" />
    <div class="clear"></div>
    <br><br>
    <p class="titulo">Cadastro de usuário</p>
   <form method="post" action="cadastrousuario.php">
    <table>
        <tr>
            <td>
                <div class="campo-area">
                    <input type="texto" class="campo" name="nome" id="nome" value="" placeholder="Nome de Usuário..." required />
                    <label>Nome de Usuário</label>
                </div>
            </td>
            <td>
                <div class="campo-area">
                    <input type="text" class="campo" name="cpf" id="cpf" value="" maxlength="14" placeholder="CPF..." required />
                    <label>CPF...</label>
                </div>
            </td>            
        </tr>
        <tr>
            <td>
                <div class="campo-area">
                    <input type="email" class="campo" name="email" id="email" value="" placeholder="E-mail..." onblur="ValidarEmail(this.id, '#FF0000', '#A2CD5A')" required />
                    <label>E-mail...</label>
                </div>
            </td>
            <td>
                <div class="campo-area">
                    <input type="email" class="campo" name="conf_email" id="email2" value="" placeholder="Confirmar E-mail..." onblur="ValidarEmail(this.id, '#FF0000', '#A2CD5A')" required />
                    <label>Confirmar E-mail...</label>
                </div>
            </td>            
        </tr>                 
        <tr>
            <td>
                <div class="campo-area">
                    <input type="password" class="campo" name="senha" id="senha" placeholder="Senha..." required />
                    <label>Senha...</label>
                </div>
            </td>
            <td>
                <div class="campo-area">
                    <input type="password" class="campo" name="conf_senha" id="senha2" placeholder="Confirmar Senha..." required />
                    <label>Confirmar Senha...</label>
                </div>
            </td>            
        </tr>         
        <tr>
            <td>
                <div class="campo-area">
                    <input type="tel" class="campo" name="telefone" id="telefone" value="" placeholder="Telefone..." required />
                    <label>Telefone...</label>
                </div>
            </td>
            <td>                
                <div class="campo-area">
                    <input type="tel" class="campo" name="celular" id="celular" value="" placeholder="Telefone Celular..." required />
                    <label>Telefone Celular...</label>
                </div>
            </td>            
        </tr>        
        <tr>
        <td>
            <input type="submit" class="btn-cadastro" id="btn-cadastro-usuario" value="Cadastrar" />
        </td>
        </tr>
    </table>
    </form>
        </div>
        <br><br>

    </div>    
    </section>
    <div class="clear"></div>
    </div>      
        </section>
        <footer>
        </footer>               
        <script src="Arquitetura/jQuery/Waypoints/jquery.waypoints.min.js"></script>
        <link href="Arquitetura/jQuery/Waypoints/animate.css" rel="stylesheet" />
        <script src="Arquitetura/jQuery/jquery-ui.min.js"></script>
    <script src="Arquitetura/jQuery/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <link href="Arquitetura/jQuery/Magnific-Popup/magnific-popup.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});

        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        $('#telefone').mask(SPMaskBehavior, spOptions);   
        $('#celular').mask(SPMaskBehavior, spOptions);        
    });

    function ValidarEmail(id, corErro, corOk) {
        var validado = true

        if ((document.getElementById(id).value.length != 0) && ((document.getElementById(id).value.indexOf("@") < 1) || (document.getElementById(id).value.indexOf('.') == -1))) {
            validado = false;
        }

        if (validado) {
            document.getElementById(id).style.borderBottomColor = corOk;
        }
        else {
            document.getElementById(id).style.borderBottomColor = corErro;
        }
    }

	</script>
</body>
</html>

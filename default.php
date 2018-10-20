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

<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" /> 
    <title>SPOT</title>
      <link href="Arquitetura/Imagens/Icones/icone.ico" rel="shortcut icon" type="image/x-icon" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
        <base href="http://www.jurandirsotero.com.br/spot2/" id="site_url" />
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
.conteudo
{
    background-image: none;
}
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

            .center { width:1000px; text-align: center;  margin: 0 auto; } 
            .clear {float: none; clear:both;}
</style>
</head>
<body onload="loadMap()" id="body">
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
                            <li><a class="popup-with-zoom-anim" href="#sobre">Sobre</a></li>
                            <li><a class="popup-with-zoom-anim" href="#cadastro-vagas">Cadastre sua Vaga</a></li>      
                            <li><a  class="popup-with-zoom-anim" href="#contato">contato</a></li>
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
                            <a class="popup-with-zoom-anim" href="#sobre" title="Sobre"  onclick="FecharMenu();">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/sobre.svg" />Sobre
                                </p>
                            </a>
                            <a class="popup-with-zoom-anim" href="#cadastro-vagas" title="Cadastro de Vagas"  onclick="FecharMenu();">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/cadastrar-vaga.svg" />Cadastrar Vaga
                                </p>
                            </a>                            
                            <a  class="popup-with-zoom-anim" href="#contato" title="Contato" onclick="FecharMenu();">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/contato.svg" />Contato
                                </p>
                            </a>
                            <a onclick="abrirLista()">
                                <p class="item-menu">
                                    <img src="Arquitetura/Imagens/Icones/lista.svg" />Lista de Vagas
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
        <section class="conteudo" onclick="FecharMenu();">        
    <section id="tabs">
        <div class="portfolio">
            <ul id="myMapList"></ul>
   
            <div id="myMap"></div>   
                              <div class="card-infos-user">
                <p class="titulo">
                Bem Vindo!                  
                </p>
                <p class="texto">
                <b>Usuário:</b> <?php echo" $logado"; ?>&nbsp;&nbsp;&nbsp;
                <b>E-mail:</b> <?php echo" $email"; ?>&nbsp;&nbsp;&nbsp;
                <b>Celular:</b> <?php echo" $celular"; ?>
                </p>
            </div> 
        </div>
    </section>      
    </section> 
    

        <div id="cadastro-vagas" class="zoom-anim-dialog mfp-hide">
    <section class="cadastro-vagas">
    <div class="container">
        <div class="col col-12">
    <p class="titulo">Cadastro de Vaga</p>
    <div class="clear"></div>
    <table>
        <tr>
            <td>
                 <div class="campo-area">
                    <input type="texto" class="campo" id="nomeProprietario" value="" placeholder="Nome do Proprietário..." required />
                    <label>Nome do Proprietário...</label>
                </div>           
            </td>
        </tr>
        <tr>
            <td>
                <div class="campo-area">
                    <input type="texto" class="campo" id="newMarker" value="" placeholder="Endereço..." required />
                    <label>Endereço...</label>
                </div>
            </td>
            <td>
                <div class="campo-area">
                    <input type="texto" class="campo" id="newMarker2" value="" placeholder="Número..." required />
                    <label>Número...</label>
                </div>
            </td>            
        </tr>
        <tr>
            <td>
                <div class="campo-area">
                    <input type="texto" class="campo" id="newMarker3" value="" placeholder="Cidade..." required />
                    <label>Cidade...</label>
                </div>
            </td>
            <td>
                <div class="campo-area">
                    <!--<input type="texto" class="campo" id="newMarker4" value="" placeholder="Estado..." required /> -->                   
                    <select class="campo" id="newMarker4" required>
                        <option value="" class="primeira" disabled selected>Estado...</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>                    
                    </select>
                    <label>Estado...</label>
                </div>
            </td>            
        </tr>                          
        <tr>
            <td>
                <div class="campo-area">
                    <input type="texto" class="campo" id="telefoneCelular" value="" placeholder="Telefone..." required />
                    <label>Telefone...</label>
                </div>
            </td>
            <td>                
                <div class="campo-area">
                    <input type="texto" class="campo" id="email" value="" placeholder="E-mail..." onblur="ValidarEmail(this.id, '#FF0000', '#A2CD5A')" required />
                    <label>E-mail...</label>
                </div>
            </td>            
        </tr>        
        <tr>
            <td>
                <div class="campo-area" style="display: none">
                    <input type="texto" class="campo" id="comprimento" value="" placeholder="Comprimento..." required />
                    <label>Comprimento...</label>
                </div>
            </td>
            <td>                
                <div class="campo-area" style="display: none">
                    <input type="texto" class="campo" id="porte" value="" placeholder="Porte do Carro..." required />
                    <label>Porte do Carro...</label>
                </div>
            </td>            
        </tr>        
        <tr>
        <td>
            <input type="submit" class="btn-cadastro popup-modal-dismiss" id="btn-cadastro-vagas" value="Enviar" onclick="newMarker();" />
        </td>
        </tr>
    </table>        
        </div>
    </div>    
    </section>
    <div class="clear"></div>
    </div>         

        <div id="sobre" class="zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="col col-12">
    <p class="titulo">Sobre Nós</p>
    <div class="clear"></div>
 <p class="descricao">
                        Cansou de procurar vagas pra estacionar o seu carro quando vai sair pra algum lugar?<br />
                        <br />
                    Com o nosso serviço, você aluga uma vaga adequada para o seu carro de uma pessoa que não usa.
                    <br />
                    <br />
                                Somos uma empresa preocupada com o seu lugar,
                                mostrando pra você as casas que estão com as vagas disponíveis perto de onde você pretende ir.
                                <br /> <br />                                          
                                Entre em contato com o dono da vaga através dos meios do Whatsapp ou do E-mail e encontre um lugar para o seu carro!
                                <br /> <br />                                  
                                <b>SPOT</b> é uma ideia de Gabriel Fonseca, Marcos Rigueiral e Renato Rodrigues.
    </p>          
        </div>
    </div>    
    <div class="clear"></div>
    </div>        

                 <div id="contato" class="zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="col col-12">
    <p class="titulo">Entre em contato</p>
    <div class="clear"></div>
 <p class="descricao">
                        Alguma dúvida de como usar o SPOT? 
                        <br>
                        Entre em contato conosco através de um dos e-mails abaixo:
                        <br>
                        <br>
                        <b>&bull;</b>&nbsp;<a href="mailto:gabrielfonseca.coutinho@outlook.com?subject=Dúvida sobre o SPOT&body=Olá gostaria esclarecer uma dúvida que tive em relação ao sistema...">gabrielfonseca.coutinho@outlook.com</a>
                        <br>
                        <br>
                        <b>&bull;</b>&nbsp;<a href="mailto:marcos.rigueiral@hotmail.com?subject=Dúvida sobre o SPOT&body=Olá gostaria esclarecer uma dúvida que tive em relação ao sistema...">marcos.rigueiral@hotmail.com</a>
                        <br>
                        <br>                        
                        <b>&bull;</b>&nbsp;<a href="mailto:rntobill@gmail.com?subject=Dúvida sobre o SPOT&body=Olá gostaria esclarecer uma dúvida que tive em relação ao sistema...">rntobill@gmail.com</a>                                                

    </p>          
        </div>
    </div>    
    <div class="clear"></div>
    </div> 
        <footer>
        </footer>               
        <script src="Arquitetura/jQuery/Waypoints/jquery.waypoints.min.js"></script>
        <link href="Arquitetura/jQuery/Waypoints/animate.css" rel="stylesheet" />
        <script src="Arquitetura/jQuery/jquery-ui.min.js"></script>
    <script src="Arquitetura/jQuery/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <link href="Arquitetura/jQuery/Magnific-Popup/magnific-popup.css" rel="stylesheet" />
        <script type="text/javascript" src="Arquitetura/jQuery/SlimScroll/jquery-ui.js"></script>
    <script type="text/javascript" src="Arquitetura/jQuery/SlimScroll/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="Arquitetura/jQuery/SlimScroll/jquery.ui.mouse.js"></script>
    <script type="text/javascript" src="Arquitetura/jQuery/SlimScroll/jquery.ui.draggable.js"></script>
    <script type="text/javascript" src="Arquitetura/jQuery/SlimScroll/SlimScroll.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <script src="Arquitetura/Javascript/Master.js"></script>
    <script src="Arquitetura/Javascript/Menu.js"></script>
    <script>
       
            // Root path to data directory
            var dataRoot = '/spot2/howto/gmap/';
         
            // data file with markers (could also be a PHP file for dynamic markers)
            var newDate = new Date;             
            var markerFile = dataRoot + 'markers.json?time=' + newDate.getTime();   
         
            // set default map properties
            var defaultLatlng = new google.maps.LatLng(-23.9678823, -46.3288865);
            
            // zoom level of the map        
            var defaultZoom = 14;
            
            // variable for map
            var map;
            
            // variable for marker info window
            var infowindow;
         
            // List with all marker to check if exist
            var markerList = {};
         
            // set error handler for jQuery AJAX requests
            $.ajaxSetup({"error":function(XMLHttpRequest,textStatus, errorThrown) {   
                alert(textStatus + ' / ' + errorThrown + ' / ' + XMLHttpRequest.responseText);
            }});
        
            // option for google map object
            var myOptions = {
                zoom: defaultZoom,
                center: defaultLatlng,
                mapTypeId: google.maps.MapTypeId.roadmap,
         styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
]                
            };
        
        
            /**
             * Load Map
             */
            function loadMap(){
        
                console.log('loadMap');

                // create new map make sure a DIV with id myMap exist on page
                map = new google.maps.Map(document.getElementById("myMap"), myOptions);
        
                // create new info window for marker detail pop-up
                infowindow = new google.maps.InfoWindow();
                
                // load markers
                loadMarkers();
            }
         
         
            /**
             * Load markers via ajax request from server
             */
            function loadMarkers(){
         
                // load marker jSon data        
                $.getJSON(markerFile, function(data) {
                    
                    // loop all the markers
                    $.each(data.markers, function(i,item){
                        
                        // add marker to map
                        loadMarker(item);   
        
                    });
                }); 
            }
        
            /**
             * Load marker to map
             */
            function loadMarker(markerData){
            
                // get date
                var mDate = new Date( markerData['created']*1000 );
            
                // create new marker location
                var myLatlng = new google.maps.LatLng(markerData['lat'],markerData['long']);
                //var url = 'dados.html';

    			var image = new google.maps.MarkerImage('Arquitetura/Imagens/Icones/MapIcon.png',
                	new google.maps.Size(46, 64)
            	);                
        
                // create new marker                
                var marker = new google.maps.Marker({
                    id: markerData['id'],
                    map: map, 
                    title: markerData['creator'] + ' - ' + markerData['name'] ,
                    position: myLatlng,
                    icon: image
                });
        
                // add marker to list used later to get content and additional marker information
                markerList[marker.id] = marker;
        
                // add event listener when marker is clicked
                // currently the marker data contain a dataurl field this can of course be done different
                //google.maps.event.addListener(marker, 'click', (function (marker, content) {
                //google.maps.event.addListener(marker, 'click', (function (marker) {
                    
                    // show marker when clicked
                    //showMarker(marker.id);
                    //return function () {
                    //$.magnificPopup.open({ items: { src: url }, type: 'iframe' });
                //}
        
                //})(marker));

                google.maps.event.addListener(marker, 'click', function() {
                    
                    // show marker when clicked
                    showMarker(marker.id);
        
                });            
        
                // add event when marker window is closed to reset map location
                google.maps.event.addListener(infowindow,'closeclick', function() { 
                    map.setCenter(defaultLatlng);
                    map.setZoom(defaultZoom);
                });     
                
                // add marker to list
                var listItem = $("<li/>");
                $("<a/>").attr('href','#').click( function() { 
                        showMarker( marker.id );
                        return false;
                    }).html('<b>Proprietário:</b> ' + markerData['creator'] + '<br>' + '<b>Endereço:</b> ' + markerData['name'] ).appendTo( listItem );
                $("<label/>").text( mDate.toDateString() ).appendTo(listItem);
                $('#myMapList').prepend( listItem );                
            }
        
           
            /**
             * Show marker info window
             */
            function showMarker(markerId){
                
                // get marker information from marker list
                var marker = markerList[markerId];
                
                // check if marker was found
                if( marker ){
                
                    // get marker detail information from server
                    $.get( dataRoot + 'data/' + marker.id + '.html' , function(data) {
                        // show marker window
                        infowindow.setContent(data);
                        infowindow.open(map,marker);
                    }); 
                }else{
                    alert('Error marker not found: ' + markerId);
                }
            }   
             
            /**
             * Adds new marker to list
             */
            function newMarker(){
         
                // get new city name
                //var markerAddress = $('#newMarker, #newMarker2, #newMarker3, #newMarker4').val();

				var markerAddress = $("#newMarker, #newMarker2, #newMarker3, #newMarker4").map(function(){
  					return this.value;
				}).get().join(" ");                

                if( markerAddress == "" ){
                    $('#newMarker').addClass('error');
                    $('#newMarker').attr('placeholder','missing location');
                    return false;
                }                

         
                // create new geocoder for dynamic map lookup
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode( { 'address': markerAddress}, function(results, status) {
                
                    // check response status
                    if (status == google.maps.GeocoderStatus.OK) {          
        
                        // set new maker id via timestamp
                        var newDate = new Date;             
                        var markerId = newDate.getTime();
                        
                        // get name of creator
                        //$('#telefoneCelular').replace("-", "");
                        var markerCreator = $('#nomeProprietario').val();
                        var markerCel = $('#telefoneCelular').val();
                        var markerEmail = $('#email').val();                        
                        
                        // create new marker data object
                        var markerData = {
                            'id': markerId,
                            'lat': results[0].geometry.location.lat(),
                            'long': results[0].geometry.location.lng(),
                            'creator': markerCreator,
                            'name': markerAddress,
                            'cel': markerCel.replace("-", "").replace("-", ""),
                            'email': markerEmail
                        };

                        $('table :input').val('');
         
                        // save new marker request to server
                        $.ajax({
                            type: 'POST',           
                            url: dataRoot + "data.php",
                            data: {
                                marker: markerData
                            },
                            dataType: 'json',
                            async: false,
                            success: function(result){
                                // add marker to map
                                loadMarker(result);
                                                        
                                // show marker detail
                                showMarker(result['id']);

                                $('#newMarker').removeClass('error');

                                // Track Piwik Goal
                                //_paq.push(['trackGoal', 2]);
                            }
                        });
                        
                      }else if( status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT){
                        alert("Marker not found:" + status);
                    }
                    
                });

            }






    </script>
</body>
</html>
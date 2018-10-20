        $(document).ready(function () {
            $('.cards-quem-somos').addClass('invisivel');
            $('.quem-somos').waypoint(function (direction) {
                if (direction === 'down') {
                    $('.cards-quem-somos').removeClass('invisivel');
                    $('.cards-quem-somos').addClass('fadeInUp');
                }
            }, { offset: '70%' });
			
            $('.cadastro-box').addClass('invisivel');
            $('.cadastro-box').waypoint(function (direction) {
                if (direction === 'down') {
                    $('.cadastro-box').removeClass('invisivel');
                    $('.cadastro-box').addClass('zoomIn');
                    $('.cadastro-box').removeClass('zoomOut');
                }
                else if (direction === 'up') {
                    $('.cadastro-box').removeClass('invisivel');
                    $('.cadastro-box').addClass('zoomOut');
                    $('.cadastro-box').removeClass('zoomIn');
                }
            }, { offset: '70%' });		

calcularLargura();

var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

//$('#telefoneCelular').mask(SPMaskBehavior, spOptions);   


 			
			});

$(function(){
    $("#telefoneCelular").mask("99-99999-9999");
});        
			         
function calcularLargura() {
    if ($(window).width() > 768) {

            $('#myMapList').slimScroll({
                size: '6px',
                width: '250px',
                height: 'calc(100vh - 64px)',
                railVisible: true,
                alwaysVisible: true,
                railOpacity: 0.8
            });     
    }

    else {

            $('#myMapList').slimScroll({
                size: '6px',
                width: '100%',
                height: '154px',
                railVisible: true,
                alwaysVisible: true,
                railOpacity: 0.8
            });     
    }
}

function abrirLista()
{    
    document.getElementById('menu-mobile-area').style.left = '-100%';
    document.getElementById('body').style.overflow = 'unset';
    document.getElementById('body').style.position = 'relative';
    $(".c-hamburger").removeClass("is-active");    
    $('.slimScrollDiv').css('bottom', '-64px');    
}

$(function () {
    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,
        
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
    $(document).on('click', '.popup-modal-dismiss', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });

    $(".card-infos-user").css("right","0");
    $(".card-infos-user").css("opacity","1");
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

$(window).scroll(function(){
    var n=$(this).scrollTop();n<=50?($(".banner-principal").css("opacity","1.0")):(n>=50,n<=249)?($(".banner-principal").css("opacity","0.4")):(n>=250,n<=349)?($(".banner-principal").css("opacity","0.2")):n>=350?($(".banner-principal").css("opacity","0.2")):($(".banner-principal").css("opacity","1.0"))});
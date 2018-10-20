(function () {
    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
        });
    }

})();

function AbrirMenu(id) {
    var e = document.getElementById(id);
    if (e.style.left == '0px') {
        e.style.left = '-100%';
        e.style.opacity = '0';
        $('.c-hamburger').removeClass('is-active');
    }

    else {
        e.style.left = '0px';
        e.style.opacity = '1';
        $('.c-hamburger').addClass('is-active');
    }
}

function FecharMenu() {
    document.getElementById('menu-mobile-area').style.left = '-100%';
    document.getElementById('body').style.overflow = 'unset';
    document.getElementById('body').style.position = 'relative';
    $(".c-hamburger").removeClass("is-active");
    $('.slimScrollDiv').css('bottom', '-254px');
}

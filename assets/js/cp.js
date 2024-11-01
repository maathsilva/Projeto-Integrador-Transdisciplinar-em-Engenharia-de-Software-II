document.addEventListener("DOMContentLoaded", function() {
    let menuResponsivo = document.querySelector('.menu-site');

    document.querySelector('#menu-icon').onclick = () => {
        menuResponsivo.classList.toggle('active');
    }

    window.onscroll = () => {
        menuResponsivo.classList.remove('active');
    }

    var swiper = new Swiper(".home-slider", {
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper = new Swiper(".menu-slider", {
        grabCursor: true,
        loop: true,
        autoHeight: true,
        centeredSlides: true,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    });

});

document.addEventListener("DOMContentLoaded", function () {

    const checkoutBTN = document.getElementById("btn-enviar");


    checkoutBTN.addEventListener("click", function (event) {
        event.preventDefault(); 

        Toastify({
            text: "Mensagem enviada com sucesso",
            duration: 4000, 
            gravity: "top", 
            position: "right", 
            style: {
                background: "#91cad6",
            },
        }).showToast();
    });
});

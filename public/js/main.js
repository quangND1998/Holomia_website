// var prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//     var currentScrollPos = window.pageYOffset;
//     if (prevScrollpos > currentScrollPos) {
//         document.getElementById("header").style.top = "0";

//     } else {
//         document.getElementById("header").style.top = "0px";
//         document.getElementById("header").style.top = "-100px";
//         //  document.getElementById("header").style.width = "100%";
//         //  document.getElementById("header").style.zIndex = "100";
//         //  document.getElementById("header").style.position = "fixed";

//     }
//     prevScrollpos = currentScrollPos;
// }

// animation aos
AOS.init();
// menu mobile
$(document).ready(function() {
    $(".meanclose").hide();
    $(".open-menu").click(function() {
        $(".open-menu").hide();
        $(".meanclose").show();
        $(".mean-nav").show();
    });
    $(".meanclose").click(function() {
        $(".open-menu").show();
        $(".meanclose").hide();
        $(".mean-nav").hide();
    });

    $(".dropdown-mobile").click(function() {
        $(".dropdown-content-mobile").toggle();
    });
});





$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    autoplay: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    autoplay: true
});

// Init fancybox, skip cloned elements

//  fancybox   //  
$().fancybox({
    selector: selector,
    backFocus: false,
    animationEffect: "fade"
});
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

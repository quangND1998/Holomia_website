let body = document.querySelector("body");
let btnShare = document.querySelector("#btn-share");
// let btnFullscreen = document.querySelector(".btn-fullscreen");

function openFullscreen() {
    if (body.requestFullscreen) {
        body.requestFullscreen();
    } else if (body.webkitRequestFullscreen) {
        /* Safari */
        body.webkitRequestFullscreen();
    } else if (body.msRequestFullscreen) {
        /* IE11 */
        body.msRequestFullscreen();
    }
}
$(document).ready(function(){
    console.log("ngaaa");
    $(".close_slidebar").click(function(){
        $(".slidebar").removeClass('show_menu');
        $(".slidebar").addClass('hide_menu');
        $(".icon_show_slidebar").show();
        $(".icon_chat").show();
    });
    $(".icon_show_slidebar").click(function(){
        console.log("ngaaa");
        $(".slidebar").toggleClass('show_menu');
        $(".slidebar").removeClass('hide_menu');

        $(".icon_show_slidebar").hide();
        $(".icon_chat").hide();
    });
    $(".close_contact").click(function(){
        $(".form_contact").hide();
    });
    $(".contactButton").click(function(){
        $(".form_contact").show();
        $(".slidebar").removeClass('show_menu');
        $(".slidebar").addClass('hide_menu');
        $(".icon_show_slidebar").show();
        $(".icon_chat").show();
    });
    // setTimeout(function() {
    //     // $(".thumblist").slideToggle();
    //     $(".slidebar").addClass('hide_menu');
    //     $(".icon_show_slidebar").show();
    //     $(".icon_chat").show();

    // }, 5000);
    $("#menu_function").click(function(){
        $(".icon_function_sub").slideToggle();
        $(".fa-ellipsis-vertical").toggleClass('fa-rotate-90');
    });
    $("#icon_unmute").on("click", function (e) {
        $("#icon_mute").show();
        $("#icon_unmute").css("display","none");
    });
    $("#icon_mute").on("click", function (e) {
      $("#icon_unmute").css("display","flex");
      $("#icon_mute").hide();
  });
  });


window.fbAsyncInit = function() {
    FB.init({
        appId: "974637342665033",
        autoLogAppEvents: true,
        xfbml: true,
        version: "v2.7"
    });
};

btnShare.onclick = function() {
    FB.ui({
            display: "popup",
            method: "share",
            href: "http://holomia.com/Gallery/Real360_celadoncity_b5a.html"
        },
        function(response) {
            // if (response && !response.error_message) {
            //     alert("Posting completed.");
            // } else {
            //     alert("Error while posting.");
            // }
            console.log(response)
        }
    );
};

// btnFullscreen.onclick = function() {
//     openFullscreen();
// };


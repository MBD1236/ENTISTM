(function($){
'use script';	

// preloder-heare
var loader =document.getElementById("preloader");

window.addEventListener("load",function(){
 loader.style.display = "none"
});

// scrollToTop
$.scrollUp({
  scrollName: 'scrollUp', // Element ID
  topDistance: '300', // Distance from top before showing element (px)
  topSpeed: 500, // Speed back to top (ms)
  animation: 'fade', // Fade, slide, none
  animationInSpeed: 200, // Animation in speed (ms)
  animationOutSpeed: 200, // Animation out speed (ms)
  scrollText: '<i class="fa-solid fa-angles-up"></i>', // Text for element
  activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});

// scrool
$(window).on('scroll',function() {    
 var scroll = $(window).scrollTop();
 if (scroll < 25) {
  $(".header-middle").removeClass("sticky");
 }else{
  $(".header-middle").addClass("sticky");
 }
});


// magnificPopup-active
$('.gallery').each(function() {
    $(this).magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});



// countdown-jquery
$("#countdown").countdown({
date: "17 march 2025 09:00:00", /*Change your time here*/
format: "on"
},
function() {
// callback function
});

// wow-js
new WOW().init();


/*toogle-up-down*/
$('.search').on('click', function () {
$(".search-form").slideToggle({ direction: "up" }, 900);
})

// owlCarousel-slider-heare
var $slider = $('.full-slide');
if($slider.length > 0){
    $slider.owlCarousel({
        loop: true,
        nav: true,
        navText:['next','prev'],
        autoplay: true,
        autoplayTimeout: 6000,
        items: 1,
        dots:false
    });
}
// owlCarousel-slider-heare
var $slider = $('.testimonial-wrapper');
if($slider.length > 0){
    $slider.owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        items: 1,
        dots:true,
    });
}

// Counter
var $CounterUp = $('.counter');
if($CounterUp.length > 0){
    $('.counter').counterUp({
        delay: 10,
        time: 2000
    });
}


}(jQuery));
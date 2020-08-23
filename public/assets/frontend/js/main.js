$(document).ready(function () {

    $('.sliders').slick({
        nextArrow: $('.btnSlider.next'),
        prevArrow: $('.btnSlider.prev'),
        autoplay: true
    });

    $('.toggleMenu').click(function(){
        $('.menu').toggleClass('active');
        $(this).toggleClass('active');
    });

    window.addEventListener("scroll", function(){
        if($("html, body").scrollTop() == 0){
            $('.scroll-to-top').removeClass("active");
        }else{
            $('.scroll-to-top').addClass("active");
        }
    });
    $('.scroll-to-top').click(function(){
        window.scrollTo(0, 0);
    });

    $('.imgLazy').lazy();

});

$(function() {
  $('.slider').slick({
    infinite: true,
    speed: 500,
    fade: true,
    autoplay:true,
    cssEase: 'linear',
    adaptiveHeight: false,
    dots: true,
    variableWidth: false,
    adaptiveWidth: true,
    centerMode: true,
    slidesToShow: 1,
    slidesToScroll: 1

  });
  $('.mobile-nav').click(function(){
   $('.header-nav').slideToggle();
  });
  $(window).scroll(function (event) {
    var sc = $(window).scrollTop();
    if (sc>=500){
      $('a.arrow-up').show();
    }else{
      $('a.arrow-up').hide();

    }
});
  $("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
   return false;
  });
  var isMobile = window.matchMedia("only screen and (max-width: 767px)").matches;

  $('.header-nav li a').click(function(){
    event.preventDefault();
    var div=$(this).attr('href');
    $('html, body').animate({
      scrollTop: $(div).offset().top
  }, 1000);
  if(isMobile){
    $('.header-nav').slideUp();
  }
  });
})

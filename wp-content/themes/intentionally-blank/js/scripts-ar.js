
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
    slidesToScroll: 1,
    rtl:true
    

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
})

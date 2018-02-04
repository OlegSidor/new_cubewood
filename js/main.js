window.onload = function(){
  $('.slider').slick({
    centerMode: true,
    centerPadding: '25%',
    slidesToShow: 1,
    draggable: false,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: "<a id='back'><img src='/imgs/prev.png' alt=''></a>",
    nextArrow: "<a id='next'><img src='/imgs/next.png' alt=''></a>",
  });
  $(".catalogue img").height($(".catalogue img:eq(0)").height())
  $(window).resize(function() {
    $(".catalogue img").removeAttr("style")
    $(".catalogue img").height($(".catalogue img:eq(0)").height())
});
}

$(document).ready(function() {
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
});

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
$('.glr-main').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: false,
  arrows: false,
  asNavFor: '.glr-nav',
});
var count;
if($('.glr-nav img').length > 4){
  count = 4;
}
else{
  count = $('.glr-nav img').length;
}
if(count != 1){
  $('.glr-nav').css('display', 'block');
$('.glr-nav').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.glr-main',
  arrows: false,
  draggable: false,
  focusOnSelect: true,
});
} else {
  $('.glr-nav').css('display', 'none');
}
}

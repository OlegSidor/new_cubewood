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
  $(".slick-track img").height($(".slick-track").height())
  $(window).resize(function() {
    $(".catalogue img").removeAttr("style")
    $(".slick-track img").css("height","auto")
    setTimeout(function(){
      $(".slick-track img").height($(".slick-track").height())
      $(".catalogue img").height($(".catalogue img:eq(0)").height())
    },10)
});
$(".mailing button").click(function(event) {
  var email = $(".mailing input").val();
  if(email.search('@') != -1 && email.search('.') != -1){
      $.post("/php/mailing.php",{email:email},function(data){
        if(data == "_OK_"){
          if(sessionStorage["language"] == "ua"){
          inf("Дякуєм за регістрацію!","green");
          } else {
          inf("Thanks for registration!","green");
          }
          $(".mailing input").val("");
        } else if(data == "_ERROR_") {
          if(sessionStorage["language"] == "ua"){
          inf("Помилка!","red");
          } else {
          inf("ERROR!","red");
          }
          $(".mailing input").val("");
        }
      });
} else {
  if(sessionStorage["language"] == "ua"){
  inf("Уведіть коректну пошту!","red");
  } else {
  inf("Enter the correct email!","red");
  }
  $(".mailing input").val("");
}
});
}
function inf(text,bgcolor){
  $("html, body").animate({scrollTop:0}, 200);
  $(".info span").text(text);
  $(".info").css("background-color",bgcolor);
  $(".info").animate({height:"50px"},100)
  setTimeout(function(){
    $(".info").animate({height:"0px"},100)
    $(".info span").text("");
  },2000)
}

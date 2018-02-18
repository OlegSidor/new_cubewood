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
$(".mailing button").click(function(event) {
  var email = $(".mailing input").val();
  if(email.search('@') != -1 && email.search('.') != -1){
    $(".mailing img").css("display","unset");
      $.post("/php/mailing.php",{email:email,lang:sessionStorage["language"]},function(data){
        console.log(data);
        if(data == "_OK_"){
          if(sessionStorage["language"] == "ua"){
          inf("Дякуєм за реєстрацію!","green");
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
        } else if(data == "_EXIST_"){
          if(sessionStorage["language"] == "ua"){
          inf("Пошта уже зареєстрована!","red");
          } else {
          inf("E-Mail is already registered!","red");
          }
          $(".mailing input").val("");
        }
        $(".mailing img").css("display","none");
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
  $(".info span").text(text);
  $(".info").css("background-color",bgcolor);
  $(".info").animate({height:"50px"},100)
  setTimeout(function(){
    $(".info").animate({height:"0px"},100)
    $(".info span").text("");
  },2000)
}

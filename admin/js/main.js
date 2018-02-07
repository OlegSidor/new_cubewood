$(document).ready(function() {
  $(".buttons button").click(function() {
    $(".functions form").css("display","none");
    $("."+$(this).attr("id")).css("display","block");
    $(".functions")
    .animate({"height":"0px"},200)
    .animate({"height":$("."+$(this).attr("id")).height()+10},500);
  });
});

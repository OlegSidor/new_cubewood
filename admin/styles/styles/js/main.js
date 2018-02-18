$(document).ready(function() {
  $(".buttons button").click(function() {
    $(".functions form").css("display","none");
    $("."+$(this).attr("id")).css("display","block");
  });
});

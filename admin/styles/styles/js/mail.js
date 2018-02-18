$(document).ready(function() {
  var emails = document.getElementsByClassName("emails");
  $(".sel_all_email").click(function() {
    var lang = $(".sel_lang").val();
    for (var i = 0; i < $(".emails."+lang+" option").length; i++) {
      if(emails[0].style.display != "none"){
      emails[0].options[i].selected = true;
    } else {
      emails[1].options[i].selected = true;
    }
    }
  });
  $(".sel_lang").change(function() {
    $(".emails").css("display","none");
    $("."+$(this).val()).css("display","block");
    var lang = $(".sel_lang").val();
    $(".emails."+lang).prop( "disabled", false );
    if(lang == "ua"){lang="eng"}else {lang="ua"};
    $(".emails."+lang).prop( "disabled", true );
    for (var i = 0; i < $(".emails."+lang+" option").length; i++) {
      if(emails[0].style.display != "none"){
      emails[1].options[i].selected = false;
    } else {
      emails[0].options[i].selected = false;
    }
    }
  });
});

$(document).ready(function() {
  $("#btnnext").click(function() {
    var currTrans = $('.items').css('transform').split(/[()]/)[1];
    var posx = currTrans.split(',')[4];
    $('.items').animate({  textIndent: posx-340 }, {duration:'slow'},'linear');
  });
});

<?php
if(isset($_POST)){
$sign = "jjahhs23hhsjasdks";
$secret = $_POST["secret"];
if($secret == md5($sign)){
  $name = $_POST["name"];
  $uah = $_POST["amount_uah"];
  $usd = $_POST["amount_usd"];
  $desc = $_POST["description"];

  // TODO:
  // - AUTO SRC
  // - AUTO URL


  $mysqli = new mysqli("localhost","root","","test");
  $mysqli -> query("SET NAME 'utf8'");
  $mysqli -> query("INSERT INTO `goods`(`name`, `src`, `cost_uah`, `cost_usd`, `url`,`description`) VALUES ('$name','','$uah','$usd','','$desc')");
  echo "Товар успішно додано";
}
} else{
  echo "ERROR";
}
?>

<?php
function createfile($email,$lang)
{
  $name = md5($email.$time).".php";
  $file = fopen("..//removemailing//$name", "w");
  $text;
  if($lang == "ua"){
  $text = "Ви успішно відписалися від розсилки.";
  } else {
  $text = "You have successfully unsubscribed from the mailing list.";
  }
  $filetext =
  "
  <meta charset=\"utf-8\">
  <?php
  \$sql = new mysqli(\"localhost\",\"root\",\"\",\"test\");
  \$sql ->query(\"SET NAME 'utf8'\");
  \$sql ->query(\"DELETE FROM `mailing_$lang` WHERE `email` = '$email'\");
  unlink(__FILE__);
  echo \"$text\";
  ?>
  ";
  fwrite($file, $filetext);
  fclose($file);
  return $name;
}
if(isset($_POST)){
$mysqli = new mysqli("localhost","root","","test");
$mysqli -> query("SET NAME 'utf8'");
$email = $_POST["email"];
$lang = $_POST["lang"];
$result = $mysqli -> query("SELECT `email` FROM `mailing_$lang` WHERE `email` = '$email'");
if($result ->num_rows == 0){
if($mysqli -> query("INSERT INTO `mailing_$lang`(`email`) VALUES ('$email')")){
  $URL = "http://cubewood.ua/removemailing/".createfile($email,$lang);
  if($lang == "ua"){
    mail($email,"CubeWood","Дякуємо що ви підписалися\n\n\nВідписатися: $URL");
  } else {
    mail($email,"CubeWood","Thank you for subscription.\n\n\nUnsubscribe: $URL");
  }
echo "_OK_";
} else {
  echo "_ERROR_";
}
} else {
  echo "_EXIST_";
}
} else {
  echo "ERROR";
}
?>

<?php
$mysqli = new mysqli("localhost","root","","test");
$mysqli -> query("SET NAME 'utf8'");
$email = $_POST["email"];
if($mysqli -> query("INSERT INTO `mailing`(`email`) VALUES ('$email')")){
echo "_OK_";
} else {
  echo "_ERROR_";
}



// TODO: ПРОВІРКА ПОШТИ НА ІСНУВАННЯ;
?>

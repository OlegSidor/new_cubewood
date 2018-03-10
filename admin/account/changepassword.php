<?php
date_default_timezone_set('UTC');
$secret = "skksuwusuua77s78Aa";
if($_COOKIE["autologin"] == md5($secret.md5(date('l jS \of F Y')))){
  if (isset($_POST["submit"])) {
    $newlogin = $_POST["newlogin"];
    $newpass = $_POST["newpass"];
    $oldpass = $_POST["oldpass"];
    $mysql = new mysqli("localhost","root","","test");
    $mysql -> query("SET NAME 'utf8'");
    $result = $mysql -> query("SELECT * FROM `admin` WHERE `id`=1");
    $result = $result -> fetch_assoc();
    if (md5($oldpass) == $result["password"]) {
            setcookie("autologin", null, time() - 1,"/admin");
            header("refresh: 1; url=/admin");
    if ($newlogin == "" || $newlogin == " ") {
        $pass = md5($newpass);
        $mysql ->query("UPDATE `admin` SET `password`='$pass' WHERE `id`=1");
        echo '<div class="info-wraper"> 
              <div class="info success">
              <span>Пароль успішно змінено</span>
              </div>
            </div>';
      } else {
        $pass = md5($newpass);
        $mysql ->query("UPDATE `admin` SET `password`='$pass',`login`='$newlogin' WHERE `id`=1");
        echo '<div class="info-wraper">
              <div class="info success">
              <span>Пароль і логін успішно змінено</span>
              </div>
            </div>';
      }
    } else {
      echo '<div class="info-wraper">
            <div class="info error">
            <span>Старий пароль було уведено невірно!</span>
            </div>
          </div>';
    }
  }
} else {
  echo die("Something wrong here");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Зміна паролю</title>
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
    <link rel="stylesheet" href="/admin/account/style/passchange.css">
  </head>
  <body>
    <div class="from-wraper">
      <form action="/admin/account/changepassword.php" method="post">
        <input type="text" name="newlogin" placeholder="Новий лонін (Не обов'язково)">
        <input required type="password" name="newpass" placeholder="Новий пароль">
        <input required type="password" name="oldpass" placeholder="Старий пароль">
        <input type="submit" name="submit" value="Змінити">
        <a href="/admin">Вернутися в адмін панель.</a>
      </form>
    </div>
  </body>
</html>

<?php
date_default_timezone_set('UTC');
$login_def = "login";
$password_def = "5f4dcc3b5aa765d61d8327deb882cf99";
$sign = "jjahhs23hhsjasdks";
$secret = "skksuwusuua77s78Aa";
if($_COOKIE["autologin"] != md5($secret.md5(date('l jS \of F Y')))){
if(isset($_POST)){
  $login = $_POST["login"];
  $password = $_POST["password"];
  if($login == $login_def && md5($password) == $password_def){
    SetCookie("autologin",md5($secret.md5(date('l jS \of F Y'))),time()+3600);
} else {
  header('Location: /admin/loginform.html');
  exit();
}
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Адмін панель</title>
    <link rel="stylesheet" href="/admin/styles/main.css">
  </head>
  <body>
    <div class="buttons">
    <button id="new_good">Добавити новий товар</button>
    <button id="responce">Відгуки</button>
    <button id="message">Повідомлення</button>
  </div>
  <div class="functions">
    <form class="new_good" action="/admin/php/newgood.php" method="post">
      <input type="text" name="secret" value="<?=md5($sign)?>" style="display:none">
      <input required type="file" name="file">
      <input required type="text" name="name" placeholder="Ім'я">
      <input pattern="^[0-9]+$" required type="text" name="amount_uah" placeholder="Грн">
      <input pattern="^[0-9]+$" required type="text" name="amount_usd" placeholder="Usd">
      <textarea name="description" required rows="10" placeholder="Описання"></textarea>
      <button type="submit" name="submit">OK</button>
    </form>
  </div>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="/admin/js/main.js"></script>
  </body>
</html>

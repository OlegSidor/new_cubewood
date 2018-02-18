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
  header('Location: /admin/loginform.php');
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
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
  </head>
  <body>
    <main>
    <div class="buttons">
    <button id="new_good">Добавити новий товар</button>
    <button id="responce">Відгуки</button>
    <button id="message">Повідомлення</button>
  </div>
  <div class="functions">
    <form class="new_good" action="/admin/php/newgood.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="secret" value="<?=md5($sign)?>" autocomplete="secret-code">
      <input required type="file" name="file">
      <input required type="text" name="name" placeholder="Ім'я">
      <input pattern="^[0-9]+$" required type="text" name="amount_uah" placeholder="Грн">
      <input pattern="^[0-9]+$" required type="text" name="amount_usd" placeholder="Usd">
      <textarea name="description" required rows="10" placeholder="Описання"></textarea>
      <button type="submit" name="submit">OK</button>
    </form>
    <form class="responce" action="index.html" method="post">
      <input type="hidden" name="secret" value="<?=md5($sign)?>" autocomplete="secret-code">
    </form>
    <form class="message" action="/admin/php/message.php" method="post">
      <input type="hidden" name="secret" value="<?=md5($sign)?>" autocomplete="secret-code">
      <select class="sel_lang" name="lang">
        <option value="ua">UA</option>
        <option value="eng">ENG</option>
      </select>
      <input type="text" name="subject" placeholder="Тема">
      <textarea name="message" placeholder="Повідомлення"></textarea>
      <button type="submit">Відправити</button>
      <?php
      function display($items,$lang)
      {
          echo '<select multiple class="emails '.$lang.'" name="emails[]">';
        while (($item = $items ->fetch_assoc())!=false) {
          echo '<option>'.$item["email"].'</option>';
        }
          echo "</select>";
      }
        $mysql = new mysqli("localhost","root","","test");
        $mysql -> query("SET NAME 'utf8'");
        $items = $mysql -> query("SELECT `email` FROM `mailing_ua`");
        display($items,"ua");
        $items = $mysql -> query("SELECT `email` FROM `mailing_eng`");
        display($items,"eng");
        ?>
      <button class="sel_all_email" type="button">Вибрати всі</button>
    </form>
  </div>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="/admin/js/main.js?"></script>
  <script type="text/javascript" src="/admin/js/mail.js"></script>
      </main>
  </body>
</html>

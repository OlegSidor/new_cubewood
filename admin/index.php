<?php
date_default_timezone_set('UTC');
$sign = "jjahhs23hhsjasdks";
$mysql = new mysqli("localhost","root","","test");
$mysql -> query("SET NAME 'utf8'");
$result = $mysql -> query("SELECT * FROM `admin` WHERE `id`=1");
$logpass = $result -> fetch_assoc();
$login_def = $logpass["login"];
$password_def = $logpass["password"];
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
} else {
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Адмін панель</title>
    <link rel="stylesheet" href="/admin/styles/main.css?<?=time()?>">
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
  </head>
  <body>
    <div class="open_rside"></div>
    <div class="rside-menu">
      <ul>
        <li><a href="/">На головну</a></li>
        <li>
          Аккаунт
          <ul>
            <li><a href="/admin/account/changepassword.php">Змінити пароль</a></li>
            <li><a href="/admin/account/exit.php">Выйти</a></li>
          </ul>
        </li>
        <li><a href="http://127.0.0.1/openserver/phpmyadmin/index.php">PhpMyAdmin</a></li>
        <li>Силки</li>
      </ul>
    </div>
    <main>
    <div class="buttons">
    <button id="new_good">Додати</button>
    <button id="delete">Видалити</button>
    <button id="responce">Відгуки</button>
    <button id="message">Повідомлення</button>
  </div>
  <div class="functions">
    <form class="new_good" action="/admin/php/newgood.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="secret" value="<?=md5($sign)?>" autocomplete="secret-code">
      <div class="main-info">
      <input required type="file" name="file">
      <input required type="text" name="name" placeholder="Ім'я">
      <input pattern="\d+(\.\d{2})?" required type="text" name="amount_uah" placeholder="Грн">
      <input pattern="\d+(\.\d{2})?" required type="text" name="amount_usd" placeholder="Usd">
      <select name='type'>
        <option value="Desk Lamp">Desktop</option>
        <option value="Handing">Handing</option>
        <option value="Sconce">Sconce</option>
        <option value="Floor lamp">Floor lamps</option>
      </select>
    </div>
    <div class="glr-imgs">
      <input id='green' multiple required type="file" name="green[]">
      <input id='blue' multiple required type="file" name="blue[]">
      <input id='orange' multiple required type="file" name="orange[]">
      <input id='red' multiple required type="file" name="red[]">
      <input id='gray' multiple required type="file" name="gray[]">
    </div>
    <div class="spacing-warning">
      <h2 style="color:red">WARNING!</h2>
      <p>У описанні не залишати лишніх пропусків!</p>
      <h4 style="color:#15c121">Правильне оформлення:</h4>
      "&lt;p&gt;Тут довге описання, яке не обов'язково читити, :) &lt;h1&gt;но впринципі&lt;/h1&gt; можна.&lt;/p&gt;"
      <h4 style="color:red">Не правильне оформлення:</h4>
      "&lt;p&gt;Тут довге описання,<br>
                                           яке не обов'язково читити, :)<br>
                  &lt;h1&gt;но впринципі&lt;/h1&gt;<br>
можна.&lt;/p&gt;"
<br>
        <p>Тобто, щоб не було лишніх відступів і переносів на новий рядок, сисьно не мішає але буде замітно</p>
    </div>
      <textarea name="description_ua" rows="10" placeholder="Описання"></textarea>
      <textarea name="description_eng" rows="10" placeholder="Описання для англ. версії"></textarea>
      <button type="submit" name="submit">OK</button>
    </form>
    <form class="delete" action="/admin/php/delete.php" method="post">
      <div class="list">
      <input type="hidden" name="secret" value="<?=md5($sign)?>" autocomplete="secret-code">
      <?php
      $del_items = $mysql -> query("SELECT `name` FROM `goods`");
      while (($item = $del_items->fetch_assoc()) != false) {
        ?>
        <div class="del_select"><input value='<?=$item['name']?>' type="checkbox" name="del_list[]"><label><?=$item['name']?></label></div>
        <?php
      }
      ?>
    </div>
    <button type="submit">Видалити</button>
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
        $items = $mysql -> query("SELECT `email` FROM `mailing_ua`");
        display($items,"ua");
        $items = $mysql -> query("SELECT `email` FROM `mailing_eng`");
        display($items,"eng");
        ?>
      <button class="sel_all_email" type="button">Вибрати всі</button>
    </form>
  </div>
  <script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="/admin/js/main.js?<?=time()?>"></script>
  <script type="text/javascript" src="/admin/js/mail.js?<?=time()?>"></script>
      </main>
  </body>
</html>

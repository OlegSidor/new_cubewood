<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="/admin/styles/login.css?<?=time()?>">
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
  </head>
  <body>
    <form action="/admin/" method="post">
      <div class="center">
      <span>Адмін панель</span>
      <input placeholder="Логін" type="text" name="login" value="">
      <input placeholder="Пароль" type="password" name="password" value="">
      <button type="submit" name="button">OK</button>
      </div>
    </form>
  </body>
</html>

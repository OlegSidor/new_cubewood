<?php
require("php/links.php");
?>
<!DOCTYPE html>
<html lang="uk-UA">
  <head>
    <meta charset="utf-8">
    <meta content="width=1180" name="viewport" id="viewport">
    <title>CubeWood</title>
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
    <link rel="stylesheet" href="/styles/main.css?<?=time()?>">
    <link rel="stylesheet" href="/UA/styles/ua.css?<?=time()?>">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
  </head>
  <body>
    <div class="info">
      <span></span>
    </div>
    <header>
      <div class="logo">
      <a href="/">
        <h1>CUBEWOOD</h1>
        <h3>Inspired by Nature</h3>
      </a>
    </div>
    <nav>
      <ul class="mine-nav">
        <li><a class="nav" href="<?=$links["about"] ?>">про нас</a></li>
        <li><a class="nav" href="<?=$links["payment_delivery"]?>">доставка та оплата</a></li>
        <li><a class="nav" href="<?=$links["contacts"]?>">контакти</a></li>
        <div class="lsel">
        <li><a class="language sel" id="ua" href="/UA">UA</a></li>
        <li><a class="language" id="end" href="/ENG">ENG</a></li>
        <li><a class="cart" href="#"><img src="/imgs/cart.png" alt="cart"> кошик <span id="count">(0)</span></a></li>
        <div class="category">
          <div><a href="<?=$links["lamps"]?>">ЛАМПИ</a></div>
          <div><a href="<?=$links["decor"]?>">ДЕКОР</a></div>
          <div><a href="<?=$links["promotions"]?>">АКЦІЇ</a></div>
        </div>
      </div>
      </ul>
      <ul class="social">
        <li><a href="<?=$links["facebook"]?>"><img src="/imgs/social/facebook.png" alt="facebook"></a></li>
        <li><a href="<?=$links["twitter"]?>"><img src="/imgs/social/twitter.png" alt="twitter"></a></li>
        <li><a href="<?=$links["instagram"]?>"><img src="/imgs/social/inst.png" alt="instagram"></a></li>
      </ul>
    </nav>
    <div class="main">
      <img src="/imgs/headlamp.png">
      <div class="bcataloge">
        <span>Browse catalogue</span><br><br>
        <span class="titl">Meet the classics<br>
        and novelties</span>
        <br>Secto Design lamps sftly invite people
        <br>to come closer. The world provides a
        <br>soft luminosity for atmosphere and
        <br>appeal
      </div>
    </div>
    </header>
    <main>
      <div class="gr-bg">
      <div class="title">
        <span>КАТАЛОГ</span>
      </div>
      <div class="catalogue">
        <div class="handing">
          <a href="<?=$links["handing"]?>">
            <img src="/imgs/catalogue/handing.png" alt="">
            <div class="name" id="handing_"><figcaption>ПІДВІСНІ
                                                світильники</figcaption></div>
          </a>
        </div>
         <div class="desktop">
          <a href="<?=$links["desktop"]?>"><img src="/imgs/catalogue/desktop.png" alt="">
            <div class="name" id="desktop_"><figcaption>НАСТІЛЬНІ
                                                світильники</figcaption></div>
          </a>
        </div>
        <div class="sconce">
          <a href="<?=$links["sconce_"]?>"><img src="/imgs/catalogue/sconce.png" alt="">
            <div class="name" id="sconce_"><figcaption>БРА</figcaption></div>
          </a>
        </div>
        <div class="floor">
          <a href="<?=$links["floor"]?>"><img src="/imgs/catalogue/floor.png" alt="">
            <div class="name" id="floor_"><figcaption>ТОРШЕРИ</figcaption></div>
          </a>
        </div>
      </div>
    </div>
      <div class="title">
        <span>РЕКОМЕНДАЦІЇ</span>
      </div>
      <div class="recomendations">
        <?php
        $mysqli = new mysqli("localhost","root","","test");
        $mysqli->query("SET NAME 'utf8'");
        $items = $mysqli->query("SELECT * FROM `goods` ORDER BY `rating` DESC");
        for ($i=0; $i < 4; $i++) {
          if(($item = $items -> fetch_assoc()) != false){
            echo "<div class='item'>
                      <a href='$item[url]'>
                        <img src='$item[src]' alt='$item[name]'>
                        <figcaption>$item[name]<span>$item[cost_uah] грн.</span></figcaption>
                      </a>
                    </div>";
          } else {
            break;
          }
        }
        ?>
      </div>
    </main>
    <div class="gr-bg slid">
    <div class="slider">
      <img src="/imgs/slider/1.jpg" alt="">
      <img src="/imgs/slider/3.jpg" alt="">
      <img src="/imgs/slider/1.jpg" alt="">
      <img src="/imgs/slider/3.jpg" alt="">
    </div>
  </div>
  <main>
  <div class="title">
    <span>ВІДГУКИ НАШИХ КЛІЄНТІВ</span>
  </div>
  <div class="response">
    <?php

    $mysqli = new mysqli("localhost","root","","test");
    $mysqli->query("SET NAME 'utf8'");
    $items = $mysqli->query("SELECT * FROM `responce` ORDER BY RAND() LIMIT 2");
    for ($i=0; $i < 2; $i++) {
      if(($item = $items -> fetch_assoc()) != false){
        echo "<div class='item'>
          <a href='$item[url]'>
          <img src='$item[src]' alt=''>
          </a>
          <div class='text'>
          <span>
            <big>“</big>$item[text]<big>„</big>
          </span>
                </div>
        </div>";
      } else {
        break;
      }
    }

    ?>
  </div>
  <div class="mailing">
    <span>РОЗСИЛКА</span>
    <input type="email" name="email" value="" placeholder="Ваш email">
    <button type="button" name="button">OK</button>
    <img src="/imgs/load.gif" alt="">
  </div>
</main>
    <footer>
      <div class="footer_content">
        <main>
        <div class="fleft">
      <div class="сopyright">
        <p>Cubewood © </p><p> Всі права захищені</p>
      </div>
      <div class="phones">
      <p>+38 097 6248321</p>
      <p>+38 093 8160499</p>
    </div>
        </div>
        <div class="fcenter">
    <div class="categoryf">
      <div><a href="<?=$links["lamps"]?>">ЛАМПИ</a></div>
      <div><a href="<?=$links["decor"]?>">ДЕКОР</a></div>
      <div><a href="<?=$links["promotions"]?>">АКЦІЇ</a></div>
    </div>
  </div>
    <div class="fright">
      <ul class="foot-nav">
        <li><a class="nav" href="<?=$links["about"] ?>">про нас</a></li>
        <li><a class="nav" href="<?=$links["payment_delivery"]?>">доставка та оплата</a></li>
        <li><a class="nav" href="<?=$links["contacts"]?>">контакти</a></li>
        <li><a class="nav" href="<?=$links["response"]?>">Відгук</a></li>
      </ul>
    </div>
    <ul class="social">
      <li><a href="<?=$links["facebook"]?>"><img src="/imgs/social/facebook.png" alt="facebook"></a></li>
      <li><a href="<?=$links["twitter"]?>"><img src="/imgs/social/twitter.png" alt="twitter"></a></li>
      <li><a href="<?=$links["instagram"]?>"><img src="/imgs/social/inst.png" alt="instagram"></a></li>
      <li><a href="<?=$links["email"]?>"><img src="/imgs/social/mail.png" alt="mail"></a></li>
    </ul>
    </main>
    </div>
    </footer>
      <!-- SCRIPTS -->
      <script type="text/javascript">
      sessionStorage["language"] = "ua";
      </script>
      <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="/js/main.js?<?=time()?>"></script>
      <script type="text/javascript" src="/js/mailing.js?<?=time()?>"></script>
      <script type="text/javascript" src="/slick/slick.min.js"></script>
  </body>
</html>

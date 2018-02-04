<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CubeWood</title>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  </head>
  <body>
    <header>
      <div class="logo">
      <a href="/">
      <img src="/imgs/logo.png" alt="Cubewood">
      </a>
      <span>Insplired by Nature</span>
      <div class="menu">
      </div>
    </div>
    <nav>
      <ul class="mine-nav">
        <li><a class="nav" href="#">про нас</a></li>
        <li><a class="nav" href="#">доставка та оплата</a></li>
        <li><a class="nav" href="#">контакти</a></li>
        <div class="lsel">
        <li><a class="language sel" id="ua" href="">UA</a></li>
        <li><a class="language" id="end" href="">ENG</a></li>
        <li><a class="cart" href="#"><img src="/imgs/cart.png" alt="cart"> кошик <span id="count">(0)</span></a></li>
      </div>
      </ul>
      <ul class="social">
        <li><a href="#"><img src="/imgs/social/facebook.png" alt="facebook"></a></li>
        <li><a href="#"><img src="/imgs/social/twitter.png" alt="twitter"></a></li>
        <li><a href="#"><img src="/imgs/social/inst.png" alt="instagram"></a></li>
      </ul>
    </nav>
    <div class="category">
      <div><a href="#">ЛАМПИ</a></div>
      <div><a href="#">ДЕКОР</a></div>
      <div><a href="#">АКЦІЇ</a></div>
    </div>
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
          <a href="#">
            <img src="/imgs/catalogue/handing.png" alt="">
            <div class="name" id="handing_"><figcaption>ПІДВІСНІ
                                                світильники</figcaption></div>
          </a>
        </div>
         <div class="desktop">
          <a href="#"><img src="/imgs/catalogue/desktop.png" alt="">
            <div class="name" id="desktop_"><figcaption>НАСТІЛЬНІ
                                                світильники</figcaption></div>
          </a>
        </div>
        <div class="sconce">
          <a href="#"><img src="/imgs/catalogue/sconce.png" alt="">
            <div class="name" id="sconce_"><figcaption>БРА</figcaption></div>
          </a>
        </div>
        <div class="floor">
          <a href="#"><img src="/imgs/catalogue/floor.png" alt="">
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
                        <img src='$item[src]' alt='WOODbrik'>
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
      <img src="/1.jpg" alt="">
      <img src="/3.jpg" alt="">
      <img src="/3.jpg" alt="">
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
    $items = $mysqli->query("SELECT * FROM `responce`");
    for ($i=0; $i < 2; $i++) {
      if(($item = $items -> fetch_assoc()) != false){
        echo "<div class='item'>
          <a href='$item[url]'>
          <img src='$item[src]' alt=''>
          </a>
          <div class='text'>
          <span>
            <strong>“</strong>$item[text]<strong>„</strong>
          </span>
                </div>
        </div>";
      } else {
        break;
      }
    }

    ?>
    <!-- <div class="item">
      <a href="#">
      <img src="/imgs/goods/cube15.jpeg" alt="">
      </a>
      <div class="text">
      <span>
        <strong>“</strong>Супер! Виконали лампи на замовлення, повністю відповідають моєму задуму. Дуже якісно. Приємно співпрацювати - все чітко, індивідуальний підхід. Із задоволенням буду рекомендувати.<strong>„</strong>
      </span>
            </div>
    </div>
    <div class="item">
      <a href="#">
      <img src="/imgs/goods/dontknowname.jpeg" alt="">
      </a>
      <div class="text">
      <span>
        <strong>“</strong>Супер! Виконали лампи на замовлення, повністю відповідають моєму задуму. Дуже якісно. Приємно співпрацювати - все чітко, індивідуальний підхід. Із задоволенням буду рекомендувати.<strong>„</strong>
      </span>
        </div>
    </div> -->
  </div>
  <div class="mailing">
    <span>РОЗСИЛКА<span>
    <input type="text" name="email" value="" placeholder="Ваш email">
    <button type="button" name="button">OK</button>
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
      <div><a href="#">ЛАМПИ</a></div>
      <div><a href="#">ДЕКОР</a></div>
      <div><a href="#">АКЦІЇ</a></div>
    </div>
  </div>
    <div class="fright">
      <ul class="foot-nav">
        <li><a class="nav" href="#">Про нас</a></li>
        <li><a class="nav" href="#">Доставка та оплата</a></li>
        <li><a class="nav" href="#">Контакти</a></li>
        <li><a class="nav" href="#">Відгук</a></li>
      </ul>
    </div>
    <ul class="social">
      <li><a href="#"><img src="/imgs/social/facebook.png" alt="facebook"></a></li>
      <li><a href="#"><img src="/imgs/social/twitter.png" alt="twitter"></a></li>
      <li><a href="#"><img src="/imgs/social/inst.png" alt="instagram"></a></li>
      <li><a href="#"><img src="/imgs/social/mail.png" alt="mail"></a></li>
    </ul>
    </main>
    </div>
    </footer>
      <!-- SCRIPTS -->

      <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="/js/main.js"></script>
      <script type="text/javascript" src="/slick/slick.min.js"></script>
  </body>
</html>

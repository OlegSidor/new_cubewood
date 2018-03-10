<?php
require("php/links.php")
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CubeWood</title>
    <link rel="icon" href="/imgs/ico.png" type="/images/png">
    <link rel="stylesheet" href="/styles/main.css?<?=time()?>">
    <link rel="stylesheet" href="/ENG/styles/eng.css?<?=time()?>">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
  </head>
  <body>
    <div class="info">
      <span></span>
    </div>
    <header>
      <div class="logo">
      <a href="/ENG/">
        <h1>CUBEWOOD</h1>
        <h3>Inspired by Nature</h3>
      </a>
    </div>
    <nav>
      <ul class="mine-nav">
        <li><a class="nav" href="<?=$links["about"]?>">about as</a></li>
        <li><a class="nav" href="<?=$links["payment_delivery"]?>">payment and delivery</a></li>
        <li><a class="nav" href="<?=$links["contacts"]?>">contacts</a></li>
        <div class="lsel">
          <li><a class="language" id="ua" href="/UA">UA</a></li>
          <li><a class="language sel" id="end" href="/ENG">ENG</a></li>
        <li><a class="cart" href="#"><img src="/imgs/cart.png" alt="cart"> cart <span id="count">(0)</span></a></li>
      </div>
      <div class="category">
        <div><a href="<?=$links["lamps"]?>">LAMGS</a></div>
        <div><a href="<?=$links["decor"]?>">DECOR</a></div>
        <div><a href="<?=$links["promotions"]?>">PROMOTIONS</a></div>
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
        <span>CATALOG</span>
      </div>
      <div class="catalogue">
        <div class="handing">
          <a href="<?=$links["handing"]?>">
            <img src="/imgs/catalogue/handing.png" alt="">
            <div class="name" id="handing_"><figcaption>HANDING
                                                lamps</figcaption></div>
          </a>
        </div>
         <div class="desktop">
          <a href="<?=$links["desctop"]?>"><img src="/imgs/catalogue/desktop.png" alt="">
            <div class="name" id="desktop_"><figcaption>DESKTOP
                                                lamps</figcaption></div>
          </a>
        </div>
        <div class="sconce">
          <a href="<?=$links["sconce"]?>"><img src="/imgs/catalogue/sconce.png" alt="">
            <div class="name" id="sconce_"><figcaption>SCONCE</figcaption></div>
          </a>
        </div>
        <div class="floor">
          <a href="<?=$links["floor"]?>"><img src="/imgs/catalogue/floor.png" alt="">
            <div class="name" id="floor_"><figcaption>FLOOR
                                                    lamps</figcaption></div>
          </a>
        </div>
      </div>
    </div>
      <div class="title">
        <span>RECOMMENDATIONS</span>
      </div>
      <div class="recomendations">
        <?php
        $mysqli = new mysqli("localhost","root","","test");
        $mysqli->query("SET NAME 'utf8'");
        $items = $mysqli->query("SELECT * FROM `goods` ORDER BY `rating` DESC");
        for ($i=0; $i < 4; $i++) {
          if(($item = $items -> fetch_assoc()) != false){
            echo "<div class='item'>
                      <a href='$item[url_eng]'>
                        <img src='$item[src]' alt='$item[name]'>
                        <figcaption>$item[name]<span>$item[cost_usd] $</span></figcaption>
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
    <span>RESPONCE OF OUR CLIENTS</span>
  </div>
  <div class="response">
    <?php

    $mysqli = new mysqli("localhost","root","","test");
    $mysqli->query("SET NAME 'utf8'");
    $items = $mysqli->query("SELECT * FROM `responce_eng` ORDER BY RAND() LIMIT 2");
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
    <span>MAILING</span>
    <input type="text" name="email" value="" placeholder="Your email">
    <button type="button" name="button">OK</button>
    <img src="/imgs/load.gif" alt="">
  </div>
</main>
    <footer>
      <div class="footer_content">
        <main>
        <div class="fleft">
      <div class="сopyright">
        <p>Cubewood © </p><p> All rights reserved</p>
      </div>
      <div class="phones">
      <p>+38 097 6248321</p>
      <p>+38 093 8160499</p>
    </div>
        </div>
        <div class="fcenter">
    <div class="categoryf">
      <div><a href="<?=$links["lamps"]?>">Lamps</a></div>
      <div><a href="<?=$links["decor"]?>">Decor</a></div>
      <div><a href="<?=$links["promotions"]?>">Promotions</a></div>
    </div>
  </div>
    <div class="fright">
      <ul class="foot-nav">
        <li><a class="nav" href="<?=$links["about"]?>">about as</a></li>
        <li><a class="nav" href="<?=$links["payment_delivery"]?>">payment and delivery</a></li>
        <li><a class="nav" href="<?=$links["contacts"]?>">contacts</a></li>
        <li><a class="nav" href="<?=$links["response"]?>">responce</a></li>
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
      sessionStorage["language"] = "eng";
      </script>
      <script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="/js/main.js?<?=time()?>"></script>
      <script type="text/javascript" src="/slick/slick.min.js"></script>
  </body>
</html>

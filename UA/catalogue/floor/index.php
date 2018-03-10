<?php
require("../../php/links.php");
require("../../../php/mysqlconnect.php");
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_TABLE);
$mysqli->query("SET NAME 'utf8'");
$sort = $mysqli -> real_escape_string($_GET["sort"]);
if($sort == "") $sort = "created-descending";
?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=1180" name="viewport" id="viewport">
<meta charset="utf-8">
<title>CubeWood</title>
<link rel="icon" href="/imgs/ico.png" type="/images/png">
<link rel="stylesheet" href="/styles/main.css?<?=time()?>">
<link rel="stylesheet" href="/UA/styles/ua.css?<?=time()?>">
<link rel="stylesheet" href="/styles/product.css?<?=time()?>">
<link rel="stylesheet" href="/styles/catalogue.css?<?=time()?>">
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
      <li><a class="language sel" id="ua" href="/UA/product/?name=<?=$good_name?>&color=<?=$color?>">UA</a></li>
      <li><a class="language" id="end" href="/ENG/product/?name=<?=$good_name?>&color=<?=$color?>">ENG</a></li>
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
</header>
<div class="divider"></div>
<div>
<div class="cont-nav"><a href='/'>Home</a> / <a href='/UA/catalogue/'>catalogue</a> / </div>
  <form class="sort" action="/UA/catalogue/" method="GET">
  <span>Сортувати за: </span>
  <select onchange="this.form.submit()" class="sort-sel" name="sort">
    <option id="best-selling" value="best-selling">Best Selling</option>
    <option id="price-ascending" value="price-ascending">Price: Low to High</option>
    <option id="price-descending" value="price-descending">Price: High to Low</option>
    <option id="created-descending" value="created-descending">Date: New to Old</option>
    <option id="created-ascending" value="created-ascending">Date: Old to New</option>
    <option id="A-Z" value="A-Z">Alphabetically: A-Z</option>
    <option id="Z-A" value="Z-A">Alphabetically: Z-A</option>
  </select>
  <script type="text/javascript">
  document.getElementById("<?=$sort?>").setAttribute("selected","");
  </script>
  </form>
</div>
<main>
  <div class="main_rside-nav">
    <main>
      <div class="nav-aboutas">
        <div class="nav-title nav-divider">Про нас</div>
        <img src="/imgs/nav-catalogue.jpeg" alt="">
      </div>
      <div class="nav-collections">
        <a href="/UA/catalogue/all-products" class="nav-coll">Усі моделі</a>
        <a href="/UA/catalogue/handing" class="nav-coll">Підвісні світильники</a>
        <a href="/UA/catalogue/sconce" class="nav-coll">Бра</a>
        <a href="/UA/catalogue/floor" class="nav-coll selected">Торшери</a>
        <a href="/UA/catalogue/desctop" class="nav-coll">Настільні світильники</a>
      </div>
      <div class="nav-news">
        <div class="nav-title nav-divider">Новинки</div>
        <?php
        $news = $mysqli -> query("SELECT `src`,`url` FROM `goods` ORDER BY `id` DESC LIMIT 5");
        $arr = array();
        for ($i=0; $i < 5; $i++) {
          $arr[$i] = $news ->fetch_assoc();
        }
        $rand = rand(0,4);
        ?>
        <a href="<?=$arr[$rand][url]?>"><img src="<?=$arr[$rand][src]?>"></a>
      </div>
      <div class="nav-production">
        <div class="nav-title nav-divider">Виробництво</div>
        <img src="/imgs/production1.JPG" alt="">
        <img src="/imgs/production2.JPG" alt="">
      </div>
    </main>
  </div>
  <div class="content-wraper">
    <div class="content">
      <?php
      switch ($sort) {
        case 'best-selling':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `rating` DESC");
        break;
        case 'price-ascending':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `cost_uah`");
        break;
        case 'price-descending':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `cost_uah` DESC");
        break;
        case 'created-descending':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `id` DESC");
        break;
        case 'created-ascending':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `id`");
        break;
        case 'A-Z':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `name`");
        break;
        case 'Z-A':
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `name` DESC");
        break;
        default:
        $products = $mysqli -> query("SELECT * FROM `goods` WHERE `type` = 'Floor lamp' ORDER BY `id`");
        break;
      }
      while (($product = $products->fetch_assoc()) != false) {
      ?>
      <div class="product">
        <a href="<?=$product[url]?>"><img src="<?=$product[src]?>"></a>
        <div class="prod-information">
          <span class="name"><?=$product['name']?></span>
          <span class="money"><?=$product['cost_uah']?> грн.</span>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
<div class="title">
<span>ВІДГУКИ НАШИХ КЛІЄНТІВ</span>
</div>
<div class="response">
<?php
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
<script type="text/javascript">
sessionStorage["language"] = "ua";
</script>
<script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/js/mailing.js?<?=time()?>"></script>
</body>
</html>

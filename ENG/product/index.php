<meta charset="utf-8">
<?php
require("../php/links.php");
require("../../php/mysqlconnect.php");
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_TABLE);
$mysqli->query("SET NAME 'utf8'");
$color = $mysqli -> real_escape_string($_GET["color"]);
if($color == ""){
$color = "green";
}
$good_name = $mysqli -> real_escape_string($_GET["name"]);
if(($mysqli->query("SELECT `name` FROM `goods` WHERE `name` = '$good_name'")->num_rows) <= 0){
die("ERROR. 404 NOT FOUND");
} else {
$result = $mysqli->query("SELECT * FROM `goods` WHERE `name` = '$good_name'");
$good = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=1180" name="viewport" id="viewport">
<title>CubeWood</title>
<link rel="icon" href="/imgs/ico.png" type="/images/png">
<link rel="stylesheet" href="/styles/main.css?<?=time()?>">
<link rel="stylesheet" href="/ENG/styles/eng.css?<?=time()?>">
<link rel="stylesheet" href="/styles/product.css?<?=time()?>">
<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
</head>
<body>
<header>
  <div class="logo">
  <a href="/ENG">
    <h1>CUBEWOOD</h1>
    <h3>Inspired by Nature</h3>
  </a>
</div>
<nav>
  <ul class="mine-nav">
    <li><a class="nav" href="<?=$links["about"] ?>">about as</a></li>
    <li><a class="nav" href="<?=$links["payment_delivery"]?>">payment and delivery</a></li>
    <li><a class="nav" href="<?=$links["contacts"]?>">contacts</a></li>
    <div class="lsel">
    <li><a class="language" id="ua" href="/UA/product/?name=<?=$good_name?>&color=<?=$color?>">UA</a></li>
    <li><a class="language sel" id="end" href="/ENG/product/?name=<?=$good_name?>&color=<?=$color?>">ENG</a></li>
    <li><a class="cart" href="#"><img src="/imgs/cart.png" alt="cart"> cart <span id="count">(0)</span></a></li>
    <div class="category">
      <div><a href="<?=$links["lamps"]?>">LAMGS</a></div>
      <div><a href="<?=$links["decor"]?>">DECOR</a></div>
      <div><a href="<?=$links["promotions"]?>">PROMOTIONS</a></div>
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
<div class="cont-nav"><a href='/'>Home</a> / <a href='/ENG/catalogue'>catalogue</a> / <a href='<?=$good["url_eng"]?>'><?=$good_name?></a></div>
<div class="main">
  <div class="galery">
    <div class="glr-main">
      <?php
      $images = scandir("../../imgs/goods/$good_name/$color");
      for ($i=0; $i < count($images); $i++) {
        if($images[$i] !="." && $images[$i] !=".."){
        ?>
        <img src="/imgs/goods/<?=$good_name?>/<?=$color?>/<?=$images[$i]?>">
        <?php
      }
      }
      ?>
    </div>
  <div class="glr-nav">
    <?php
    for ($i=0; $i < count($images); $i++) {
      if($images[$i] !="." && $images[$i] !=".."){
      ?>
      <img src="/imgs/goods/<?=$good_name?>/<?=$color?>/<?=$images[$i]?>">
      <?php
    }
    }
    ?>
  </div>
</div>
<div class="information">
<h1 class="name"><?=$good_name?></h1>
<div class="sel-color">
  <a href="<?="/ENG/product/?name=".$good_name."&color=green"?>"><div id="green"></div></a>
  <a href="<?="/ENG/product/?name=".$good_name."&color=blue"?>"><div id="blue"></div></a>
  <a href="<?="/ENG/product/?name=".$good_name."&color=orange"?>"><div id="orange"></div></a>
  <a href="<?="/ENG/product/?name=".$good_name."&color=red"?>"><div id="red"></div></a>
  <a href="<?="/ENG/product/?name=".$good_name."&color=gray"?>"><div id="gray"></div></a>
</div>
<h2 class="cost"><?=$good["cost_usd"]?> $</h2>
<form class="purchase" action="#" method="POST">
  <input type="text" value="1">
  <button type="submit">Order now</button>
</form>
<div class="description">
  <?=$good["description_eng"]?>
</div>
<div class="type">Type: <?=$good["type"]?></div>
</div>
</div>
<div class="slider">
  <img src="/imgs/slider/1.jpg" alt="">
  <img src="/imgs/slider/3.jpg" alt="">
  <img src="/imgs/slider/1.jpg" alt="">
  <img src="/imgs/slider/3.jpg" alt="">
</div>
<main>
<div class="title">
<span>RESPONCE OF OUR CLIENTS</span>
</div>
<div class="response">
<?php
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
<script type="text/javascript" src="/slick/slick.min.js"></script>
<script type="text/javascript" src="/js/product.js?<?=time()?>"></script>
</body>
</html>

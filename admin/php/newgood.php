<meta charset="utf-8">
<?php
require_once("../../php/mysqlconnect.php");
if(isset($_POST["secret"])){
$sign = "jjahhs23hhsjasdks";
$secret = $_POST["secret"];
if($secret == md5($sign)){
  $mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_TABLE);
  $mysqli -> query("SET NAME 'utf8'");
  $name = $mysqli -> real_escape_string($_POST["name"]);
  $result = $mysqli -> query("SELECT `name` FROM `goods` WHERE `name` = '$name'");
  if($result -> num_rows == 0){
  $uah = $mysqli -> real_escape_string($_POST["amount_uah"]);
  $usd = $mysqli -> real_escape_string($_POST["amount_usd"]);
  $desc_ua = $mysqli -> real_escape_string($_POST["description_ua"]);
  $desc_eng = $mysqli -> real_escape_string($_POST["description_eng"]);
  $Gtype = $mysqli ->real_escape_string($_POST["type"]);
  $url = "/UA/product/?name=$name&color=green";
  $url_eng = "/ENG/product/?name=$name&color=green";
  $src;
  if(isset($_FILES["file"])){
    if ($_FILES["file"]["error"] == 0) {
      $type = explode("/", $_FILES["file"]["type"]);
      if($type[0] == "image"){
        $src = "/imgs/goods/$name.$type[1]";
        move_uploaded_file($_FILES["file"]["tmp_name"],"../../imgs/goods/$name.$type[1]");
      } else {
        exit("Тільки картинки");
      }
    } else {
      exit("Помилка при завантаженні файла");
    }
    $g_tname = $_FILES["green"]["tmp_name"]; $g_type = $_FILES["green"]["type"]; $g_name = $_FILES["green"]["name"];$gr_error = $_FILES["green"]["error"];
    $b_tname = $_FILES["blue"]["tmp_name"]; $b_type = $_FILES["blue"]["type"]; $b_name = $_FILES["blue"]["name"]; $gr_error = $_FILES["blue"]["error"];
    $o_tname = $_FILES["orange"]["tmp_name"]; $o_type = $_FILES["orange"]["type"]; $o_name = $_FILES["orange"]["name"]; $gr_error = $_FILES["orange"]["error"];
    $r_tname = $_FILES["red"]["tmp_name"]; $r_type = $_FILES["red"]["type"]; $r_name = $_FILES["red"]["name"]; $gr_error = $_FILES["red"]["error"];
    $gr_tname = $_FILES["gray"]["tmp_name"]; $gr_type = $_FILES["gray"]["type"]; $gr_name = $_FILES["gray"]["name"]; $gr_error = $_FILES["gray"]["error"];
    mkdir("../../imgs/goods/$name");
    mkdir("../../imgs/goods/$name/green");
    mkdir("../../imgs/goods/$name/blue");
    mkdir("../../imgs/goods/$name/orange");
    mkdir("../../imgs/goods/$name/red");
    mkdir("../../imgs/goods/$name/gray");
    for ($i=0; $i < count($g_tname); $i++) {
      if ($g_error[$i] == 0) {
        $type = explode("/", $g_type[$i]);
        if($type[0] == "image"){
          move_uploaded_file($g_tname[$i],"../../imgs/goods/$name/green/".uniqid().".$type[1]");
        }
      } else {
        echo "Помилка при завантаженні $g_name[$i]<br>";
      }
    }
    for ($i=0; $i < count($b_tname); $i++) {
      if ($b_error[$i] == 0) {
        $type = explode("/", $b_type[$i]);
        if($type[0] == "image"){
          move_uploaded_file($b_tname[$i],"../../imgs/goods/$name/blue/".uniqid().".$type[1]");
        }
      } else {
        echo "Помилка при завантаженні $b_name[$i]<br>";
      }
    }
    for ($i=0; $i < count($o_tname); $i++) {
      if ($o_error[$i] == 0) {
        $type = explode("/", $o_type[$i]);
        if($type[0] == "image"){
          move_uploaded_file($o_tname[$i],"../../imgs/goods/$name/orange/".uniqid().".$type[1]");
        }
      } else {
        echo "Помилка при завантаженні $o_name[$i]<br>";
      }
    }
    for ($i=0; $i < count($r_tname); $i++) {
      if ($r_error[$i] == 0) {
        $type = explode("/", $r_type[$i]);
        if($type[0] == "image"){
          move_uploaded_file($r_tname[$i],"../../imgs/goods/$name/red/".uniqid().".$type[1]");
        }
      } else {
        echo "Помилка при завантаженні $r_name[$i]<br>";
      }
    }
    for ($i=0; $i < count($gr_tname); $i++) {
      if ($gr_error[$i] == 0) {
        $type = explode("/", $gr_type[$i]);
        if($type[0] == "image"){
          move_uploaded_file($gr_tname[$i],"../../imgs/goods/$name/gray/".uniqid().".$type[1]");
        }
      } else {
        echo "Помилка при завантаженні $gr_name[$i]<br>";
      }
    }
  } else {
    exit("Файл не найдено");
  }
  $mysqli -> query("INSERT INTO `goods`(`name`, `src`, `cost_uah`, `cost_usd`, `url`, `url_eng`,`description`, `description_eng`, `type`) VALUES ('$name','$src','$uah','$usd','$url','$url_eng','$desc_ua','$desc_eng','$Gtype')");
  echo "Товар успішно додано<br><a href='/admin'>На головну</a>";
} else {
  die("Товар з таким іменем уже існує <br><a href='/admin'>На головну</a>");
}
} else die("Something wrong here");
} else{
  die("Something wrong here");
}
?>

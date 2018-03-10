<meta charset="utf-8">
<?php
require_once("../../php/mysqlconnect.php");
function rdir($dir) {
  if ($objs = glob($dir."/*")) {
     foreach($objs as $obj) {
       is_dir($obj) ? rdir($obj) : unlink($obj);
     }
  }
  rmdir($dir);
}
if(isset($_POST["secret"])){
$sign = "jjahhs23hhsjasdks";
$secret = $_POST["secret"];
if($secret == md5($sign)){
  $mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_TABLE);
  $mysqli -> query("SET NAME 'utf8'");
  $del_list = $_POST["del_list"];
  for ($i=0; $i < count($del_list); $i++) {
    $result = $mysqli -> query("SELECT `src` FROM `goods` WHERE `name` = '$del_list[$i]'");
    $result = $result -> fetch_assoc();
    unlink("../..".$result["src"]);
    rdir("../../imgs/goods/$del_list[$i]");
    if($mysqli -> query("DELETE FROM `goods` WHERE `name`='$del_list[$i]'")){
    echo "Товар $del_list[$i] успішно видалено<br>";
    } else {
    echo "Товар $del_list[$i] видалити не получилось, хотя файли можуть бути видаленні. Будьласка видаліть через phpMyAdmin<br>";
    }
  }
  echo "<a href='/admin'>На головну</a>";
} else die("Something wrong here");
} else die("Something wrong here");
?>

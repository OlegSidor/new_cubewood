<meta charset="utf-8">
<?php
if(isset($_POST)){
$sign = "jjahhs23hhsjasdks";
$secret = $_POST["secret"];
if($secret == md5($sign)){
  $name = $_POST["name"];
  $uah = $_POST["amount_uah"];
  $usd = $_POST["amount_usd"];
  $desc = $_POST["description"];
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
  } else {
    exit("Файл не найдено");
  }
  // TODO:
  // - AUTO URL


  $mysqli = new mysqli("localhost","root","","test");
  $mysqli -> query("SET NAME 'utf8'");
  $mysqli -> query("INSERT INTO `goods`(`name`, `src`, `cost_uah`, `cost_usd`, `url`,`description`) VALUES ('$name','$src','$uah','$usd','','$desc')");
  echo "Товар успішно додано";
}
} else{
  echo "ERROR";
}
?>

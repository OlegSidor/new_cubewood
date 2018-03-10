<?php
$links = array();
$mysql = new mysqli("localhost","root","","test");
$mysql -> query("SET NAME 'utf8'");
$alllinks = $mysql -> query("SELECT * FROM `links_ua`");
while (($link = $alllinks ->fetch_assoc()) != false) {
  $links[$link["name"]] = $link["url"];
}
?>

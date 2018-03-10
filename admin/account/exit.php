<?php
if (isset($_COOKIE["autologin"])) {
  setcookie("autologin", null, time() - 1,"/admin");
  header("Location: /admin");
} else {
  header("Location: /admin");
}
?>

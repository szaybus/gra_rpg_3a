<?php
include 'class/Hero.class.php';
session_start();
$hero = $_SESSION['hero'];
echo '<h1>Karta postaci:</h1>';
foreach ($hero->stats as $name => $value) {
  echo $name,": ",$value,"<br>";
}
?>

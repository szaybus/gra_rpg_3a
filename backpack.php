<?php
include 'class/Hero.class.php';
session_start();
$hero = $_SESSION['hero'];
echo '<h1>Plecak:</h1>';
$hero->backpack->showItemTable();

?>

<?php
include 'class/Hero.class.php';
session_start();
$hero = $_SESSION['hero'];
$hero->backpack->showItemTable();

?>

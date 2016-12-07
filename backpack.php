<?php
require_once 'class/hero.class.php';
session_start();
$hero = $_SESSION['hero'];
echo '<pre>';
print_r($hero);
echo '</pre>';
?>

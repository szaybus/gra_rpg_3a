<?php
require_once 'class/hero.class.php';
session_start();
$hero = $_SESSION['hero'];
?>

<h3>Statystyki bohatera:</h3>
HP: <?php echo $hero->getHP(); ?><br>
MP: <?php echo $hero->getMana(); ?>

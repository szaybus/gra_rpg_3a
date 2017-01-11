<?php
require_once('class/Hero.class.php');
require_once('class/Imp.class.php');
session_start();

//spardz czy bohater jest obecny w sesji
if(isset($_SESSION['hero'])) {
  //jeśli jest obecny w sesji bohater to wczytaj z sesji do zmiennej $hero
  $hero = $_SESSION['hero'];
  $monsters = $_SESSION['monsters'];
} else {
  $hero = new Hero(); // jeśli nie to stworz nowego
  $monsters = Array();
}

//$imp = new Imp();
//$imp->defend(5);

//$hero->move('north');
//$hero->move('east');
//$hero->attack($imp);


if(isset($monsters[$hero->posX][$hero->posY])) {
  //walka
  $hero->attack($monsters[$hero->posX][$hero->posY]);
}


$_SESSION['hero'] = $hero;
$_SESSION['monsters'] = $monsters;
?>

<pre>
<?php print_r($hero);

      print_r($_SESSION); ?>
</pre>

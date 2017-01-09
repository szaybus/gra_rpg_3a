<?php
require_once('class/Hero.class.php');
require_once('class/Imp.class.php');
session_start();

//spardz czy bohater jest obecny w sesji
if(isset($_SESSION['hero'])) {
  //jeśli jest obecny w sesji bohater to wczytaj z sesji do zmiennej $hero
  $hero = $_SESSION['hero'];
} else $hero = new Hero(); // jeśli nie to stworz nowego

$imp = new Imp();
//$imp->defend(5);

//$hero->move('north');
//$hero->move('east');
$hero->attack($imp);

$_SESSION['hero'] = $hero;
?>

<pre>
<?php print_r($hero);
      print_r($imp);
      print_r($_SESSION); ?>
</pre>

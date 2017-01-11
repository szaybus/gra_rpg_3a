<?php
require_once('class/imp.class.php');
session_start();
if(isset($_SESSION['monsters'])) {
  $monsters = $_SESSION['monsters'];
}
else $monsters = Array();
/// tworzymy losowo 3 potwory w zakresie mapy -5,5

$x = rand(-5,5);
$y = rand(-5,5);
$i = new Imp();
$i->posX = $x;
$i->posY = $y;
if(!isset($monsters[$x][$y]))
  $monsters[$x][$y] = $i;

/*
$placeFree = true;
foreach ($monsters as $monster) {
  if($monster->posX == $x && $monster->posY == $y) {
    $placeFree = false;
  }
}
if($placeFree) array_push($monsters, $i);
*/

$_SESSION['monsters'] = $monsters;
?>
<pre>
<?php
print_r($i);
print_r($_SESSION);
?>
</pre>

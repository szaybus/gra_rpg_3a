<?php
require_once 'class/Hero.class.php';
session_start();
$hero = $_SESSION['hero'];
$mapa = $_SESSION['mapa'];

$heroLocation = $hero->getLocation(); // [x][y]
//echo "<br>Mapa: <br>";
echo '<table>';
for ($y=$heroLocation[1]+5; $y >= $heroLocation[1]-5 ; $y--) {
  echo '<tr>';
  for ($x=$heroLocation[0]-5; $x <= $heroLocation[0]+5 ; $x++) {
    $typTerenu = $mapa[$x][$y];
    echo '<td><img src="img/'.$typTerenu.'.jpg"></td>';
    //echo "<td>($x, $y)</td>";
  }
  echo '</tr>';
}
echo '</table>';
?>

<?php
// przetwarzanie danych od uzytjownika
if(isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'attack':
      // Nacisnieto atakuj
      $hero->attack();
      break;
    case 'defend':
      // Nacisnieto bron sie
      $hero->shield();
      break;
    case 'heal':
      // Nacisnieto lecz sie
      $hero->heal();
      break;
    case 'move':
      $hero->move($_REQUEST['direction']); //$hero->move('east');
      break;
    default:
      // Błędna zawartosc zmiennej action
      break;
  }
}
var_dump($_REQUEST);
?>

<?php
require_once('item.class.php');
class Backpack {
  protected $items = Array();

  function putInBackpack($_item) {
      //dołącz item do tabeli items na koniec
      array_push($this->items, $_item);
  }
}

?>

<?php
require_once('class/Item.class.php');
/**
 * Klasa będąca reprezentacją plecaka gracza
 */
class Backpack
{
  public $items = Array();
  public $itemStats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0);
  function __construct()
  {
    # code...
  }
  function addToBackpack($_item) {
    array_push($this->items, $_item);
    $this->calculateItemStats();
  }
  function calculateItemStats() {
    $this->itemStats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0);
    foreach ($this->items as $item) {
      foreach ($item->stats as $key => $value) {
        //key - nazwa staty
        //value - wartosc staty
        if(isset($item->stats[$key])) $this->itemStats[$key] += $value;
      }
    }
  }
  function showItemTable() {
    echo '<table border=1>';
    foreach ($this->items as $key => $item) {
      $item->itemTableRow();
    }
    echo '</table>';
  }
}

?>

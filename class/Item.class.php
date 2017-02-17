<?php
/**
 * Klasa reprezentuje dowolny item w grze.
 */
class Item
{
  public $name = "";
  public $stats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0);
  function __construct($_name, $_str = 0, $_dex = 0, $_int = 0, $_sta = 0)
  {
    $this->name = $_name;
    $this->stats = ['str' => $_str, 'dex' => $_dex,
                    'int' => $_int, 'sta' => $_sta];
    echo 'Utworzono item...';
  }
  function itemTableRow() {
    echo '<tr><td>',$this->name,'</td><td>',$this->stats['str'],'</td><td>',
          $this->stats['dex'],'</td><td>',$this->stats['int'],'</td><td>',
          $this->stats['sta'],'</td></tr>';
  }
}

 ?>

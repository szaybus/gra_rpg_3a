<?php
require_once('class/Character.class.php');
require_once('class/Backpack.class.php');
/**
 * Klasa dla reprezentacji gracza w świecie - bohater
 * $hero->stats - całkowite staty
 */
class Hero extends Character
{
  public $backpack;
  private $baseStats = Array();
  private $itemStats = Array('str' => 3, 'sta' => 5);
  private $buffStats = Array('str' => 1, 'dex' => 3);
  public $stats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0,
                        'hp' => 0, 'mp' => 0); //finalna tabela ze statami
  function __construct() {
    $this->name = "Arkadiusz";
    $this->backpack = new Backpack();
    $this->baseStats = Array('str' => 5, 'dex' => 3, 'int' => 3, 'sta' => 5,
                          'hp' => 25, 'mp' => 15);
    $this->calculateStats();
  }
  function calculateStats(){
    $this->itemStats = $this->backpack->itemStats;
    //$this->stats['str'] = $this->baseStats['str'] + $this->itemStats['str'] +
    //                      $this->buffStats['str'];
    foreach ($this->stats as $key => $value) {
      //echo 'Foreach, key: ',$key,' value: ',$value,' ustawiam na ',$this->baseStats[$key],'<br>';
      $this->stats[$key] = $this->baseStats[$key];
      if(isset($this->itemStats[$key])) $this->stats[$key] += $this->itemStats[$key];
      if(isset($this->buffStats[$key])) $this->stats[$key] += $this->buffStats[$key];
    }
  }
  function move($direction) {
    //$direction = {north, east, west, south}
    switch($direction) {
      case 'north':
        $this->posY++;
        break;
      case 'south':
        $this->posY--;
        break;
      case 'east':
        $this->posX++;
        break;
      case 'west':
        $this->posX--;
        break;
      default:
        break;
    }
  }

}


?>

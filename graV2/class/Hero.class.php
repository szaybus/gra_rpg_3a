<?php
require_once('class/Character.class.php');
/**
 * Klasa dla reprezentacji gracza w świecie - bohater
 */
class Hero extends Character
{

  function __construct() {
    $this->name = "Arkadiusz";
    $this->stats = Array('str' => 5, 'dex' => 3, 'int' => 3, 'sta' => 5,
                          'hp' => 200);
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

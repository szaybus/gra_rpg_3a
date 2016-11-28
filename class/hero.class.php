<?php
require_once('character.class.php');
class Hero extends Character
{
  function __construct() {
    $this->att = 7;
    $this->def = 4;
    $this->hp = 200;
    $this->baseHp = $this->hp;
    $this->mana = 50;
    $this->baseMana = $this->mana;
    $this->healAmmount = 10;
    $this->bonusDefTurnsLeft = 0;
    $this->bonusDefAmmount = 3;
    $this->name =  "Bohater";
  }

  function shield() {
    $this->bonusDefTurnsLeft = 3;
  }
  function defend ($damage) {
    // Funkcja odpowiada za otrzymanie obrazen $damage
    //zmniejsz hp o $damage minus $def
    if($this->bonusDefTurnsLeft > 0) {
      //aktywna tarcza
      $damage = $damage - ($this->def + $this->bonusDefAmmount);
      $this->bonusDefTurnsLeft--;
    } else {
      //nieaktywna tarcza
      $damage = $damage - $this->def;
    }
    if($damage < 0) $damage = 0;
    $this->hp = $this->hp - $damage;
    $this->log("$this->name otrzymuje $damage obrazen<br>
          $this->name ma w tej chwili $this->hp punktow zycia<br>");
  }
  function move($direction) {
    //$direction = {north, east, south, west}
    switch ($direction) {
      case 'north':
        $this->posY += 1;
        break;
      case 'east':
        $this->posX += 1;
        break;
      case 'south':
        $this->posY -= 1;
          break;
      case 'west':
        $this->posX -= 1;
        break;
    }
  }
  function getLocation() {
    return Array($this->posX, $this->posY);
  }
  function getHp() {
    return $this->hp;
  }
  function getBaseHp() {
    return $this->baseHp;
  }
  function getHpPercent() {
    return ($this->hp / $this->baseHp)*100;
  }
  function getMana() {
    return $this->mana;
  }
  function getBaseMana() {
    return $this->baseMana;
  }
  function getManaPercent() {
    return ($this->mana / $this->baseMana)*100;
  }
 }

?>

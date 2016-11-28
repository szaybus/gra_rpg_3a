<?php
require_once('character.class.php');
class Imp extends Character
{
  function __construct() {
    $this->att = 5;
    $this->def = 2;
    $this->hp = 100;
    $this->name =  "Imp";
  }

}

?>

<?php
require_once('class/Character.class.php');
/**
 * Klasa dla reprezentacji gracza w świecie - bohater
 */
class Imp extends Character
{

  function __construct() {
    $this->name = "Imp";
    $this->stats = Array('str' => 3, 'dex' => 2, 'int' => 1, 'sta' => 2,
                          'hp' => 80);
  }
}


?>

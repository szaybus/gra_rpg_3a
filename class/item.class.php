<?php
class Item {
  protected $name = "";
  protected $weight ="";
  function __construct($_name, $_weight) {
    $this->name = $_name;
    $this->weight = $_weight;
  }
}
?>

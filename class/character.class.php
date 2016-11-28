<?php
class Character
{
  protected $att = 0;
  protected $def = 0;
  protected $hp = 0;
  protected $baseHp = 0;
  protected $healAmmount = 0;
  protected $name = "";
  protected $posX = 0;
  protected $posY = 0;
  function log($text) {
    global $log;
    array_push($log, $text);
  }
  function attack ($target) {
    // Fukcja odpowiada za zaatakowanie $target przez impa
    $this->log("$this->name atakuje za $this->att<br>");
    $target->defend($this->att);
  }
  function defend ($damage) {
    // Funkcja odpowiada za otrzymanie obrazen $damage
    //zmniejsz hp o $damage minus $def
    $damage = $damage - $this->def;
    if($damage < 0) $damage = 0;
    $this->hp = $this->hp - $damage;
    $this->log("$this->name otrzymuje $damage obrazen<br>
          $this->name ma w tej chwili $this->hp punktow zycia<br>");
  }
  function heal() {
    $this->hp += $this->healAmmount;
    if($this->hp > $this->baseHp) $this->hp = $this->baseHp;
    $this->log("$this->name leczy się o $this->healAmmount,
          ma teraz $this->hp punktow zycia.<br>");
  }
  function isAlive () {
    // Funkcja zwraca true jeśli imp jest zywy (hp>0)
    if($this->hp > 0) return true;
    else return false;
  }
}

?>

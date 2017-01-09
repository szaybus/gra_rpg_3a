<?php
class Character
{
  public $name = '';
  public $posX = 0;
  public $posY = 0;
  public $stats;
  function __construct()
  {
    $this->stats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0,
                          'hp' => 0);
  }
  function attack($target) {
    $hit = 'miss';
    $dmg = $this->stats['str'] * 2;
    $hitChance = 20 * $this->stats['dex'];
    $critChance = 2 * $this->stats['dex'];
    $r = rand(0,100);
    echo "Rzut K100: $r<br>";
    if($r > $hitChance) $hit = 'miss';
    if($r <= $hitChance) $hit = 'hit';
    if($r <= $critChance) $hit = 'crit';
    switch($hit) {
      case 'miss':
        echo 'Spudłowałeś<br>';
        break;
      case 'hit':
        echo 'Trafiłeś<br>';
        echo "Zadajesz $dmg obrazen<br>";
        $target->defend($dmg);
        break;
      case 'crit':
        echo "Trafiłeś krtytycznie<br>";
        $dmg *= 1.5;
        echo "Zadajesz $dmg obrazen<br>";
        $target->defend($dmg);
        break;
    }
  }
  function defend($dmg) {
    echo "$this->name otrzymuje $dmg obrazen<br>";
    $this->stats['hp'] -= $dmg;
  }
}
?>

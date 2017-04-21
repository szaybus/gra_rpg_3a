<?php
/**
 * Klasa reprezentuje dowolny item w grze.
 */
class Item
{
  public $name = "";
  public $stats = Array('str' => 0, 'dex' => 0, 'int' => 0, 'sta' => 0);
  /*function __construct($_name, $_str = 0, $_dex = 0, $_int = 0, $_sta = 0)
  {
    $this->name = $_name;
    $this->stats = ['str' => $_str, 'dex' => $_dex,
                    'int' => $_int, 'sta' => $_sta];
    echo 'Utworzono item...';
  }*/
  function __construct() {
    $this->randomItemRarity();
    $this->randomItemType();
    $this->randomItemStats();

    $this->name = $this->rarity." ".$this->type." of ".$this->suffix;
    echo 'You found ',$this->name;
  }
  function itemTableRow() {
    echo '<tr><td>',$this->name,'</td><td>',$this->stats['str'],'</td><td>',
          $this->stats['dex'],'</td><td>',$this->stats['int'],'</td><td>',
          $this->stats['sta'],'</td></tr>';
  }
  function randomItemRarity() {
    $this->rarity = "";
    if(rand(0,100) <= 40) {
      $this->rarity = "Rare";
      if(rand(0,100) <= 20){
        $this->rarity = "Epic";
        if(rand(0,100) <= 5)
          $this->rarity = "Legendary";
      }
    }
  }
  function randomItemType() {
    $r = rand(1,9);
    if($r == 1)
    $this->type = "Sword";
    if($r == 2)
    $this->type = "Shield";
    if($r == 3)
    $this->type = "Chestplate";
    if($r == 4)
    $this->type = "Boots";
    if($r == 5)
    $this->type = "Trinket";
    if($r == 6)
    $this->type = "Dagger";
    if($r == 7)
    $this->type = "Helmet";
    if($r == 8)
    $this->type = "Necklace";
    if($r == 9)
    $this->type = "Ring";

  }
  function randomItemStats() {
    /*
    $nazwyStatow = array_keys($this->stats);
    var_dump($nazwyStatow);
    do {
        $mainStat = $nazwyStatow[rand(0,4)];

    }
    while($this->type == "Sword" && ($mainStat != 'str' || $mainStat != 'dex' ) ||
          $this->type == "Chestplate" && ($mainStat != 'str' || $mainStat != 'sta' || $mainStat != 'def') ||
          $this->type == "Shield" && ($mainStat != 'sta' || $mainStat != 'def' ) ||
          $this->type == "Boots" && ($mainStat != 'dex' ) ||
          $this->type == "Ring" && ($mainStat != 'sta' || $mainStat != 'int' ) ||
          $this->type == "Necklace" && ($mainStat != 'str' || $mainStat != 'int' ) ||
          $this->type == "Trinket" && ($mainStat != 'dex' || $mainStat != 'int' ) ||
          $this->type == "Dagger" && ($mainStat != 'dex' ) ||
          $this->type == "Helmet" && ($mainStat != 'def')
        );
      */
    if($this->type == "Sword") $mainStat = Array('str','dex')[rand(0,1)];
    if($this->type == "Shield") $mainStat = Array('sta','def',)[rand(0,1)];
    if($this->type == "Chestplate") $mainStat = Array('sta','def','str')[rand(0,2)];
    if($this->type == "Boots") $mainStat = Array('dex')[rand(0,0)];
    if($this->type == "Ring") $mainStat = Array('sta','int')[rand(0,1)];
    if($this->type == "Necklace") $mainStat = Array('int','str')[rand(0,1)];
    if($this->type == "Trinket") $mainStat = Array('int','dex')[rand(0,1)];
    if($this->type == "Dagger") $mainStat = Array('dex')[rand(0,0)];
    if($this->type == "Helmet") $mainStat = Array('def')[rand(0,0)];
    $multi = 1;
    if($this->rarity == "Legendary") $multi = 2;
    if($this->rarity == "Epic") $multi = 1.5;
    if($this->rarity == "Rare") $multi = 1.2;

    if($this->type == "Sword" || $this->type == "Chestplate" || $this->type == "Necklace")
      $this->stats['str'] = rand(0,4*$multi);
    if($this->type == "Shield" || $this->type == "Chestplate" || $this->type == "Ring")
      $this->stats['sta'] = rand(0,4*$multi);
    if($this->type == "Trinket" || $this->type == "Dagger" || $this->type == "Boots")
      $this->stats['dex'] = rand(0,4*$multi);
    if($this->type == "Ring" || $this->type == "Trinket" || $this->type == "Necklace")
    $this->stats['int'] = rand(0,4*$multi);
      if($this->type == "Shield" || $this->type == "Chestplate" || $this->type == "Helmet")
    $this->stats['def'] = rand(0,4*$multi);

    $this->stats[$mainStat] = rand(1,10*$multi);
    $suffixList = Array('str'=>'Strenght', 'dex' => 'Dexterity',
                    'int' => 'Intelligence', 'sta' => 'Stamina',
                    'def' => 'Defence');
    $this->suffix = $suffixList[$mainStat];
  }
  function getItemRarity(){
    //returns utem rarity ={none, normal, rare, epic}
    return $this->rarity;
  }
}

 ?>

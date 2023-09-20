<?php

class Character {
  var $name;
  var $attackType;
  var $baseDamage;
  var $bonusDamage;
  var $baseHealth;
  var $agility;
  var $intelligence;
  var $strength;

  function bonusDamageCalculator($mainStat) {
    $this->bonusDamage = $this->bonusDamage + $mainStat;
  }
}

class rangedCharacter extends Character {
  var $accuracy = 100;
  var $totalRangeDistance = 200;
  
  function missChance($range) {
    $this->accuracy - ($range * 0.15);
  }

  function getMainStat() {
    return $this->agility;
  }
  function getMainStatType() {
    return 'Agility';
  }
}

class meleeCharacter extends Character {
  var $weaponDurability = 0;

  function durabilityDecider($weaponType){
    if ($weaponType == 'axe') {
      $this->weaponDurability = 35;
    }
    elseif ($weaponType =='mace') {
      $this->weaponDurability = 25;
    }
    elseif ($weaponType == 'sword') {
      $this->weaponDurability = 45;
    }
    else {
      return 'invalid weapon type';
    }
  }

  function getMainStat() {
    return $this->strength;
  }

  function getMainStatType() {
    return 'Strength';
  }
}

class magicCharacter extends Character {
  var $mana = 100;
  var $spellDamage;
  var $spellType;
  
  function spellDamageCalculator() {
    if ($this->spellType == 'Fire ball') {
      $this->mana -= 25;
      $this->spellDamage = 15;
    }
    elseif ($this->spellType == 'Blizzard') {
      $this->mana -= 50;
      $this->spellDamage = 45;
    }
    elseif ($this->spellType == 'Charged bolt') {
      $this->mana -= 15;
      $this->spellDamage = 10;
    }
    else {
      return 'invalid spell type';
    }
  }  

  function getMainStat() {
    return $this->intelligence;
  }

  function getMainStatType() {
    return 'Intelligence';
  }
}

// Create a ranged character
$ranged = new rangedCharacter();
$ranged->name = "Archer Anna";
$ranged->agility = 15;
$ranged->intelligence = 10;
$ranged->strength = 12;
$ranged->baseDamage = 20;
$ranged->baseHealth = 150;
$ranged->getMainStatType();

// Create a melee character
$melee = new meleeCharacter();
$melee->name = "Knight Kevin";
$melee->strength = 20;
$melee->agility = 13;
$melee->intelligence = 11;
$melee->baseDamage = 35;
$melee->baseHealth = 250;
$melee->getMainStatType();

// Create a magic character
$magic = new magicCharacter();
$magic->name = "Mage Mike";
$magic->intelligence = 18;
$magic->agility = 14;
$magic->strength = 16;
$magic->baseDamage = 15;
$magic->baseHealth = 120;
$magic->getMainStatType();

$characters = [$ranged, $melee, $magic];
foreach ($characters as $character) {
    echo "Name: " . $character->name . "</br>";
    echo "Base Damage: " . $character->baseDamage . "</br>";
    echo "Bonus Damage: :" . $character->getMainStat() . "</br>";
    echo "Base Health: " . $character->baseHealth . "</br>";
    echo "Agility: " . $character->agility . "</br>";
    echo "Intelligence: " . $character->intelligence . "</br>";
    echo "Strength: " . $character->strength . "</br>";
    echo "Main Stat (" . get_class($character) . "): " . $character->getMainStatType() . "</br></br>";
}

?>

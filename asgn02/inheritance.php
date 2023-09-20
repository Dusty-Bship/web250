<?php

class Character {
  // Properties
  protected $name;
  protected $attackType;
  protected $baseDamage;
  protected $bonusDamage;
  protected $baseHealth;
  protected $agility;
  protected $intelligence;
  protected $strength;

  // Methods
  public function bonusDamageCalculator($mainStat) {
    $this->bonusDamage = $this->bonusDamage + $mainStat;
  }
}

class rangedCharacter extends Character {
  protected $accuracy = 100;
  protected $totalRangeDistance = 200;

  public function missChance($range) {
    $this->accuracy - ($range * 0.15);
  }

  public function getMainStat() {
    return $this->agility;
  }

  public function getMainStatType() {
    return 'Agility';
  }
}

class meleeCharacter extends Character {
  protected $weaponDurability = 0;

  public function durabilityDecider($weaponType) {
    if ($weaponType == 'axe') {
      $this->weaponDurability = 35;
    } elseif ($weaponType =='mace') {
        $this->weaponDurability = 25;
    } elseif ($weaponType == 'sword') {
        $this->weaponDurability = 45;
    } else {
        return 'invalid weapon type';
    }
  }

  public function getMainStat() {
    return $this->strength;
  }

  public function getMainStatType() {
    return 'Strength';
  }
}

class magicCharacter extends Character {
  protected $mana = 100;
  protected $spellDamage;
  protected $spellType;

  public function spellDamageCalculator() {
    if ($this->spellType == 'Fire ball') {
      $this->mana -= 25;
      $this->spellDamage = 15;
    } elseif ($this->spellType == 'Blizzard') {
        $this->mana -= 50;
        $this->spellDamage = 45;
    } elseif ($this->spellType == 'Charged bolt') {
        $this->mana -= 15;
        $this->spellDamage = 10;
    } else {
        return 'invalid spell type';
    }
  }

  public function getMainStat() {
    return $this->intelligence;
  }

  public function getMainStatType() {
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

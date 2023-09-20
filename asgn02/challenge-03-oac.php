<?php
class Bicycle {
  //properties
  public $brand;
  public $model;
  public $year;
  public $description;
  public $weight_kg;

  //methods
  public function name() {
    return $this->year . ' ' . $this->brand . ' ' . $this->model;
  } 

  public function weight_lbs() {
    $weight_lbs = $this->weight_kg * 2.204;
    return number_format($weight_lbs, 2) . "lbs";
  }

  function set_weight_lbs($weightLbs) {
    $this->weight_kg = $weightLbs / 2.204;
  }
}
$Deore = new Bicycle;
$Deore->brand = "Salsa";
$Deore->model = "Rangefinder Deore";
$Deore->year = "2020";
$Deore->description = "Build confidence as you discover your local trail system with the Salsa Rangefinder Deore 10-speed 29 mountain bike.";
$Deore->weight_kg = 17.74;

$DRT1 = new Bicycle;
$DRT1->brand = "Co-op Cycles";
$DRT1->model = "DRT1.0";
$DRT1->year = "2021";
$DRT1->description = "For riders who're ready to rip some singletrack, the Co-op Cycles DRT 1.0 features 26 in. wheels";
$DRT1->weight_kg = 14.06;

echo "Used bike listing:</br>";
echo "</br>" . $Deore->name() . "</br>";
echo $Deore->weight_kg . "kg / " . $Deore->weight_lbs() . "</br>";
echo "</br>" . $DRT1->name() . "</br>";
echo $DRT1->weight_kg . "kg / " . $DRT1->weight_lbs() . "</br>";

$DRT1->set_weight_lbs(31);

echo number_format($DRT1->weight_kg, 2) . "kg / " . $DRT1->weight_lbs();
?>
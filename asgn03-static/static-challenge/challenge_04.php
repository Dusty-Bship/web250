<?php

use Bicycle as GlobalBicycle;

class Bicycle {
  //properties
  public $brand;
  public $model;
  public $year;
  public $category;
  public $description;
  private $weight_kg = 0;
  protected $wheels = 2;
  public static $instance_count = 0;
  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  //methods
  public function name() {
    return $this->year . ' ' . $this->brand . ' ' . $this->model . ' ' . $this->category . '</br> ' . $this->description;
  } 

  public function weight_lbs() {
    $weight_lbs = $this->weight_kg * 2.204;
    return number_format($weight_lbs, 2) . "lbs";
  }

  public function set_weight_lbs($weightLbs) {
    $this->weight_kg = $weightLbs / 2.204;
  }

  public function wheel_details() {
    if ($this->wheels == 2)
      return "It has 2 wheels.";
    else
      return "it has 1 wheel.";
  }

  public function weight_kg() {
    return $this->weight_kg . "kg";
  }

  public function set_weight_kg($weight_kg) {
    $this->weight_kg = $weight_kg;
  }

  public static function create() {
    self::$instance_count++;
    $newClass = get_called_class();
    return new $newClass;
  }
  
}

class Unicycle extends Bicycle {
  protected $wheels = 1;
}

$Deore = Bicycle::create();
$Deore->brand = "Salsa";
$Deore->model = "Rangefinder Deore";
$Deore->year = "2020";
$Deore->category = Bicycle::CATEGORIES[2];
$Deore->description = "Build confidence as you discover your local trail system with the Salsa Rangefinder Deore 10-speed 29 mountain bike.";
$Deore->set_weight_kg(17.74);

$DRT1 = Bicycle::create();
$DRT1->brand = "Co-op Cycles";
$DRT1->model = "DRT1.0";
$DRT1->year = "2021";
$DRT1->category = Bicycle::CATEGORIES[2];
$DRT1->description = "For riders who're ready to rip some singletrack, the Co-op Cycles DRT 1.0 features 26 in. wheels";
$DRT1->set_weight_kg(14.06);

echo "Used bike listing:</br>";
echo "</br>" . $Deore->name() . "</br>";
echo $Deore->weight_kg() . " / " . $Deore->weight_lbs() . "</br> " . $Deore->wheel_details() . "</br>";
echo "</br>" . $DRT1->name() . "</br>";
echo $DRT1->weight_kg() . " / " . $DRT1->weight_lbs() . "</br> " . $DRT1->wheel_details() . "</br>";
echo "</br>The total number of bicycles posted for sale is " . Bicycle::$instance_count . '.';

?>
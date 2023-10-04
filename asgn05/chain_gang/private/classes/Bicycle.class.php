<?php
class Bicycle {
  //properties
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  public $condition_id;
  private $weight_kg = 0;
  protected $wheels = 2;
  public static $instance_count = 0;
  public const GENDER = ['male','female', 'unisex'];
  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  //Defines a constant array CONDITION mapping integers to descriptive strings about an item's condition.
  public const CONDITION = [1=>'Beat up', 2=>'Decent', 3=>'Good', 4=>'Great', 5=>'Like new'];

  //constructor
  public function __construct($args=[]) {
    $this->brand = $args['brand'] ?? NULL;
    $this->model = $args['model'] ?? NULL;
    $this->year = $args['year'] ?? NULL;
    $this->category = $args['category'] ?? NULL;
    $this->color = $args['color'] ?? NULL;
    $this->description = $args['description'] ?? NULL;
    $this->gender = $args['gender'] ?? NULL;
    $this->price = $args['price'] ?? NULL;
    $this->condition_id = $args['condition_id'] ?? NULL;
    $this->weight_kg = $args['weight_kg'] ?? NULL;
  }

  //methods
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

  //This 'condition' function retrieves a readable condition from the CONDITION array using $this->condition_id as an index. If the ID is 0 or negative, it returns an error message indicating an invalid condition ID.
  public function condition() {
    if($this->condition_id > 0)
      return self::CONDITION[$this->condition_id];
    else
      return 'Error invalid condition ID';
  }

  public static function create() {
    self::$instance_count++;
    $newClass = get_called_class();
    return new $newClass;
  }
}
?>
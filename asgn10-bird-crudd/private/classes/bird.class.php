<?php

class Bird extends DatabaseObject {

  static public $table_name = 'birds';
  static public $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $conservation_id;
  public $backyard_tips;

  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct',
  ];

 
  public function __construct($args=[]) {
    $this->common_name = $args['common_name'] ?? 'Peregrine Falcon';
    $this->habitat = $args['habitat'] ?? 'Mountain regions';
    $this->food = $args['food'] ?? 'Seeds';
    $this->conservation_id = $args['conservation_id'] ?? '1';
    $this->backyard_tips = $args['backyard_tips'] ?? 'Grow native plants to provide natural food sources';
  }

  
  public function conservation() {
    if($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }


  public function validate() {
    $this->errors = [];

    if(is_blank($this->common_name)) {
      $this->errors[] = "Bird name cannot be blank.";
    }
    if(is_blank($this->habitat))
        $this->errors[] = "Habitat cannot be blank.";
    return $this->errors;
  }
}

?>

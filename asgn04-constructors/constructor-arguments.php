<?php

use Bird as GlobalBird;

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? NULL; 
    $this->latinName = $args['latinName'] ?? NULL; 
  }
}

$flyCatcher = new Bird (['commonName'=>'Acadian Flycatcher', 
                         'latinName'=>'Turdus migratorius']);

$towhee = new Bird (['commonName'=>'Eastern Towhee',
                     'latinName'=>'Pipilo erythrophthalmus']);

echo $flyCatcher->commonName . "</br>";
echo $flyCatcher->latinName;
echo "<hr>";
echo $towhee->commonName . "</br>";
echo $towhee->latinName;

?>

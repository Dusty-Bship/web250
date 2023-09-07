<?php
class Bird {
  var $commonName;
  var $food;
  var $nestPlacement;
  var $conservationLevel;

  function song() {
    if($this->commonName == "Eastern Towhee")
      return "drink your tea!";
    elseif($this->commonName == "Indigo Bunting")
    return "whatwhat!";
  }

  function canFly() {
    if($this->commonName == "Eastern Towhee" || $this->commonName == "Indigo Bunting")
        return "this bird can fly";
  }
}

$bird1 = new Bird;
$bird1->commonName = "Eastern Towhee";
$bird1->food = "seeds, fruits, insects, spiders";
$bird1->nestPlacement = "on the ground";
$bird1->conservationLevel = "low";

$bird2 = new Bird;
$bird2->commonName = "Indigo Bunting";
$bird2->food = "small seeds, berries, buds, and insects";
$bird2->nestPlacement = "along roadsides, and railroad rights of ways, and on the edges of fields";
$bird2->conservationLevel = "low";

echo "Our first bird species is the $bird1->commonName.</br>They like to eat $bird1->food, and put their nests $bird1->nestPlacement. </br>Fortunately for the $bird1->commonName due to the fact that " . $bird1->canFly() . ", their conservation status is $bird1->conservationLevel.</br>They are also known for their birdsong " . $bird1->song() . "</br>";

echo "</br>Our second bird species is the $bird2->commonName.</br>They like to eat $bird2->food, and put their nests $bird2->nestPlacement. </br>Fortunately for the $bird2->commonName due to the fact that " . $bird2->canFly() . ", their conservation status is $bird2->conservationLevel.</br>They are also known for their birdsong " . $bird2->song()
?>